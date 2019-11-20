<?php

namespace App\Controller\bda;

use App\Entity\Club;
use App\Entity\Content;
use App\Entity\Event;
use App\Entity\Pole;
use App\Entity\Section;
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
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description","BDA", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName("BDA");
        return $this->render('bda/index.html.twig', [
            'controller_name' => 'BDAIndexController',
            "description" => $description,
            "clubs" =>  $this->getDoctrine()->getRepository(Club::class)->findAll(),
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDA", $request->getLocale()),
            "poles" => $poles
        ]);
    }

    /**
     * @Route({
     *     "en": "/bda/events",
     *     "fr": "/bda/evenements"
     * }, name="bda_events")
     */
    public function events(Request $request)
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->findEventsToComeBySectionName("BDA");
        return $this->render('bda/events.html.twig', [
            'controller_name' => 'BDAIndexController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDA", $request->getLocale()),
            "lang" => $request->getLocale(),
            "events" => $events
        ]);
    }

    /**
     * @Route({
     *     "en": "/bda/clubs",
     *     "fr": "/bda/clubs"
     * }, name="bda_clubs")
     */
    public function leaders(Request $request)
    {
        return $this->render('bda/clubs.html.twig', [
            'controller_name' => 'BDAIndexController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDA", $request->getLocale()),
            'clubs' => $this->getDoctrine()->getRepository(Club::class)->findAll(),
        ]);
    }

}
