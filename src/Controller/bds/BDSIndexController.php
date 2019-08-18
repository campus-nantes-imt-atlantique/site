<?php

namespace App\Controller\bds;

use App\DataFixtures\SportPlanningFixture;
use App\Entity\Content;
use App\Entity\Member;
use App\Entity\Pole;
use App\Entity\Sport;
use App\Entity\SportPlanning;
use App\Repository\SportPlanningRepository;
use App\Repository\SportRepository;
use App\Utils\DateUtils;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BDSIndexController extends AbstractController
{
    /**
     * @Route("/bds", name="bds_index")
     */
    public function index(Request $request)
    {
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName("BDS");
        return $this->render('bds/index.html.twig', [
            'controller_name' => 'BDSIndexController',
            "description" => $description,
            "poles" => $poles
        ]);
    }

    /**
     * @Route({
     *     "en": "/bds/leaders",
     *     "fr": "/bds/responsables"
     * }, name="bds_leaders")
     */
    public function leaders(TranslatorInterface $translator)
    {
        $allSports = $this->getDoctrine()->getRepository(Sport::class)->findAll();
        $sports = array();
        foreach ($allSports as $sport) {
            if ($sport->getSameLineSport() != null) {
                $mergedLeaders = array_merge($sport->getLeaders(), $sport->getSameLineSport()->getLeaders());
                $newSportName = $sport->getName() . " " . $translator->trans('and') . " " . $sport->getSameLineSport()->getName();
                if ($sports[$sport->getSameLineSport()->getName()] != null) {
                    unset($sports[$sport->getSameLineSport()->getName()]);
                }
                $sport->setLeaders($mergedLeaders);
                $sport->setName($newSportName);
                $sports[$newSportName] = $sport;
            } else {
                $sports[$sport->getName()] = $sport;
            }
        }
        return $this->render('bds/leaders.html.twig', [
            'controller_name' => 'BDSIndexController',
            'sports' => $sports
        ]);
    }

    /**
     * @Route({
     *     "en": "/bds/planning",
     *     "fr": "/bds/planning"
     * }, name="bds_planning")
     */
    public function planning(DateUtils $dateUtils)
    {
        $weekDays = array("Monday","Tuesday","Wednesday","Thurday","Friday","Saturday","Sunday");
        $start = $this->getDoctrine()->getRepository(SportPlanning::class)->findBy([], ['start' => 'ASC'])[0]->getStart();
        $end = $this->getDoctrine()->getRepository(SportPlanning::class)->findBy([], ['end' => 'DESC'])[0]->getEnd();
        $minutesNumber = $dateUtils->getMinutesInterval($end,$start);
        $sportsPerDays = array();
        foreach ($weekDays as $weekDayName) {
            $weekDay = $this->getDoctrine()->getRepository(SportPlanning::class)->findByEnglishDay($weekDayName);
            $sportsPerDays[$weekDayName] = $this->sortPlanningWithoutConflicts($weekDay);
        }
        return $this->render('bds/planning.html.twig', [
            'controller_name' => 'BDSIndexController',
            'sportsPerDays' => $sportsPerDays,
            'minutesNumber' => $minutesNumber,
            'minutesNumberInOneHour' => 60,
            'minutesInterval' => 15,
            'startDate'  => $start,
            'endDate' => $end
        ]);
    }

    /**
     * @param $sports
     * @param array $sportsResult
     * @param int $shift
     * @return array
     */
    public function sortPlanningWithoutConflicts($sports): array
    {
        $sportsResult = array();
        $shift = 0;
        foreach ($sports as $sport) {
            if (count($sportsResult) == $shift) {
                $sportsResult[$shift] = array();
                array_push($sportsResult[$shift], $sport);
                continue;
            }
            $sportAlreadyPushed = false;
            for ($i = 0; $i < $shift; $i++) {
                if ($sport->getStart() >= $sportsResult[$i][count($sportsResult[$i]) - 1]->getEnd()) {
                    array_push($sportsResult[$i], $sport);
                    $sportAlreadyPushed = true;
                    break;
                }
            }
            if (!$sportAlreadyPushed) {
                $shift++;
                $sportsResult[$shift] = array();
                array_push($sportsResult[$shift], $sport);
            }
        }
        return $sportsResult;
    }


}
