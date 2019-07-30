<?php

namespace App\Controller\bds;

use App\Entity\Sport;
use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BDSIndexController extends AbstractController
{
    /**
     * @Route("/bds", name="bds_index")
     */
    public function index()
    {
        return $this->render('bds/index.html.twig', [
            'controller_name' => 'BDSIndexController',
        ]);
    }

    /**
     * @Route({
     *     "en": "/bds/leaders",
     *     "fr": "/bds/responsables"
     * }, name="bds_leaders")
     */
    public function leaders()
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();
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
