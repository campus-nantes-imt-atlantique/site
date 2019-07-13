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
}
