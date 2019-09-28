<?php

namespace App\Controller\bda;

use App\Entity\Content;
use App\Entity\Pole;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BDAIndexController extends AbstractController
{
    /**
     * @Route("/bda", name="bda_index")
     */
    public function index(Request $request)
    {
        $navDescription = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDA", $request->getLocale());
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description","BDA", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName("BDA");
        return $this->render('bda/index.html.twig', [
            'controller_name' => 'BDAIndexController',
            "description" => $description,
            "navigation_description" => $navDescription,
            "poles" => $poles
        ]);
    }
}
