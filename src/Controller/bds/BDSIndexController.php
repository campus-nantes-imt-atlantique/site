<?php

namespace App\Controller\bds;

use App\Entity\Content;
use App\Entity\Sport;
use App\Repository\SportRepository;
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
        return $this->render('bds/index.html.twig', [
            'controller_name' => 'BDSIndexController',
            "description" => $description
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
    public function planning()
    {
        return $this->render('bds/planning.html.twig', [
            'controller_name' => 'BDSIndexController',
        ]);
    }
}
