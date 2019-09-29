<?php


namespace App\Controller\campus;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

class CampusController extends AbstractController
{
    /**
     * @Route("/campus", name="campus")
     */
    public function campus () {
        return $this->render('campus/campus.html.twig');
    }

    /**
     * @Route("/campus/sponsors", name="sponsors")
     */
    public function sponsors () {
        return $this->render('campus/sponsors.html.twig');

    }

    /**
     * @Route("/campus/vie", name="vie")
     */
    public function vie () {
        return $this->render('campus/vie.html.twig');
    }

}