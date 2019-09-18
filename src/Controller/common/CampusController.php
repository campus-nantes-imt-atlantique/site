<?php


namespace App\Controller\common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

class CampusController extends AbstractController
{
    /**
     * @Route("/campus", name="campus")
     */
    public function contact () {
        return $this->render('common/campus.html.twig');

    }

}