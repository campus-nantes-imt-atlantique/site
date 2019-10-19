<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'events' => $this->getDoctrine()->getRepository(Event::class)->findEventsToCome(),
            'bds_feature' => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("section_feature","BDS", $request->getLocale()),
            'bde_feature' => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("section_feature","BDE", $request->getLocale()),
            'bda_feature' => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("section_feature","BDA", $request->getLocale()),
            'je_feature' => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("section_feature","JE", $request->getLocale()),
        ]);
    }
}
