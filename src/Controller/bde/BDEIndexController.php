<?php

namespace App\Controller\bde;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BDEIndexController extends AbstractController
{
    /**
     * @Route("/bde", name="bde_index")
     */
    public function index()
    {
        return $this->render('bde/index.html.twig', [
            'controller_name' => 'BDEIndexController',
        ]);
    }
}
