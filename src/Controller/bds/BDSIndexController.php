<?php

namespace App\Controller\bds;

use App\Entity\Content;
use App\Entity\Member;
use App\Entity\Pole;
use App\Entity\Sport;
use App\Entity\SportPlanning;
use App\Repository\SportPlanningRepository;
use App\Repository\SportRepository;
use App\Utils\DateUtils;
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
        $mondaySportsResult = array();
        $mondaySports = $this->getDoctrine()->getRepository(SportPlanning::class)->findByEnglishDay("Monday");
        $shift = 0;
        $start = $this->getDoctrine()->getRepository(SportPlanning::class)->findBy([], ['start' => 'ASC'])[0]->getStart();
        $end = $this->getDoctrine()->getRepository(SportPlanning::class)->findBy([], ['end' => 'DESC'])[0]->getEnd();
        $minutesNumber = $dateUtils->getMinutesInterval($end,$start);
        foreach ($mondaySports as $mondaySport) {
            if( count($mondaySportsResult) == $shift ) {
                $mondaySportsResult[$shift] = array();
                array_push($mondaySportsResult[$shift], $mondaySport);
                continue;
            }
            $sportAlreadyPushed = false;
            for ($i = 0 ; $i < $shift; $i++) {
                if ($mondaySport->getStart() >= $mondaySportsResult[$i][count($mondaySportsResult[$i]) - 1]->getEnd() ) {
                    array_push($mondaySportsResult[$i], $mondaySport);
                    $sportAlreadyPushed = true;
                    break;
                }
            }
            if (!$sportAlreadyPushed) {
                $shift++;
                $mondaySportsResult[$shift] = array();
                array_push($mondaySportsResult[$shift], $mondaySport);
            }
        }
        return $this->render('bds/planning.html.twig', [
            'controller_name' => 'BDSIndexController',
            'mondaySports' => $mondaySportsResult,
            'minutesNumber' => $minutesNumber,
            'minutesInterval' => 15,
            'startDate'  => $start,
            'endDate' => $end
        ]);
    }


}
