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
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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
        $navDescription = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDS", $request->getLocale());
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description","BDS", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName("BDS");
        return $this->render('bds/index.html.twig', [
            'controller_name' => 'BDSIndexController',
            "description" => $description,
            "navigation_description" => $navDescription,
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
                $mergedLeaders = new ArrayCollection(
                    array_merge($sport->getLeaders()->toArray(), $sport->getSameLineSport()->getLeaders()->toArray())
                );
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

    public const EVENING_PLANNING_START_DATE = '08:00:00';
    public const EVENING_PLANNING_END_DATE = '23:59:59';
    public const DAY_PLANNING_START_DATE = '08:00:00';
    public const DAY_PLANNING_END_DATE = '16:00:00';

    /**
     * @Route({
     *     "en": "/bds/planning",
     *     "fr": "/bds/planning"
     * }, name="bds_planning")
     */
    public function planning(DateUtils $dateUtils, TranslatorInterface $translator)
    {
        $weekDays = array("days.monday","days.tuesday","days.wednesday","days.thursday","days.friday","days.saturday","days.sunday");

        $eveningPlanningStart = DateTime::createFromFormat("H:i:s",BDSIndexController::EVENING_PLANNING_START_DATE);
        $eveningPlanningEnd = DateTime::createFromFormat("H:i:s",BDSIndexController::EVENING_PLANNING_END_DATE);
        $eveningPlanningMinutesNumber = $dateUtils->getMinutesInterval($eveningPlanningEnd,$eveningPlanningStart);

        $dayPlanningStart = DateTime::createFromFormat("H:i:s",BDSIndexController::DAY_PLANNING_START_DATE);
        $dayPlanningEnd = DateTime::createFromFormat("H:i:s",BDSIndexController::DAY_PLANNING_END_DATE);
        $dayPlanningMinutesNumber = $dateUtils->getMinutesInterval($dayPlanningEnd,$dayPlanningStart);

        $sportsPerDaysEveningPlanning = array();
        $sportsPerDaysDayPlanning = array();

        foreach ($weekDays as $weekDayName) {
            $weekDayEveningPlanning = $this->getDoctrine()->getRepository(SportPlanning::class)->findByEnglishDay($translator->trans($weekDayName,array(),null,'en'), BDSIndexController::EVENING_PLANNING_START_DATE,BDSIndexController::EVENING_PLANNING_END_DATE);
            $weekDayDayPlanning = $this->getDoctrine()->getRepository(SportPlanning::class)->findByEnglishDay($translator->trans($weekDayName,array(),null,'en'), BDSIndexController::DAY_PLANNING_START_DATE,BDSIndexController::DAY_PLANNING_END_DATE);
            $sportsPerDaysEveningPlanning[$weekDayName] = $this->sortPlanningWithoutConflicts($weekDayEveningPlanning);
            $sportsPerDaysDayPlanning[$weekDayName] = $this->sortPlanningWithoutConflicts($weekDayDayPlanning);
        }
        return $this->render('bds/planning.html.twig', [
            'controller_name' => 'BDSIndexController',
            'sportsPerDaysEveningPlanning' => $sportsPerDaysEveningPlanning,
            'sportsPerDaysDayPlanning' => $sportsPerDaysDayPlanning,
            'eveningPlanningMinutesNumber' => $eveningPlanningMinutesNumber,
            'dayPlanningMinutesNumber' => $dayPlanningMinutesNumber,
            'eveningPlanningStartDate'  => $eveningPlanningStart,
            'eveningPlanningEndDate' => $eveningPlanningEnd,
            'dayPlanningStartDate'  => $dayPlanningStart,
            'dayPlanningEndDate' => $dayPlanningEnd,
            'minutesInterval' => 15
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
