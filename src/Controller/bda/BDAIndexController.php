<?php

namespace App\Controller\bda;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BDAIndexController extends AbstractController
{
    /**
     * @Route("/bda", name="bda_index")
     */
    public function index()
    {
        return $this->render('bda/index.html.twig', [
            'controller_name' => 'BDAIndexController',
        ]);
    }
}
