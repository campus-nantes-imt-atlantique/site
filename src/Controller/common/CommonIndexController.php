<?php

namespace App\Controller\common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommonIndexController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {

        return $this->render('common/contact.html.twig', [
            'controller_name' => 'CommonIndexController',
        ]);
    }
}
