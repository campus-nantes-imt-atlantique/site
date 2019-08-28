<?php

namespace App\Controller\je;


use App\Entity\Content;
use App\Entity\Member;
use App\Entity\Pole;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JEIndexController extends AbstractController
{
    /**
     * @Route("/je", name="je_index")
     */
    public function index(Request $request)
    {
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description_je", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName('JE');

        return $this->render('je/index.html.twig', [
            'controller_name' => 'JEIndexController',
            'description' => $description,
            'poles' => $poles
        ]);
    }

    /**
     * @Route("/je/etude", name="je_etude")
     */
    public function etude()
    {
        return $this->render('je/deroulement_etude.html.twig',[
            'controller_name' => 'JEIndexController'
        ]);
    }

    /**
     * @Route("je/contact",name="je_contact")
     */
    public function contact()
    {
        return $this->render('je/contact.html.twig',[
            'controller_name' => 'JEIndexController'
        ]);
    }

    /**
     * @Route("je/missions",name="je_missions")
     */
    public function missions()
    {
        return $this->render('je/missions.html.twig',[
            'controller_name' => 'JEIndexController'
        ]);
    }
}

