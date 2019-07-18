<?php

namespace App\Controller\bds;

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
        return $this->render('bds/leaders.html.twig', [
            'controller_name' => 'BDSIndexController',
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
