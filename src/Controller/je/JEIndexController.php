<?php

namespace App\Controller\je;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JEIndexController extends AbstractController
{
    /**
     * @Route("/je", name="je_index")
     */
    public function index()
    {
        return $this->render('je/index.html.twig', [
            'controller_name' => 'JEIndexController',
        ]);
    }
}
