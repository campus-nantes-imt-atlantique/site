<?php

namespace App\Controller\bde;

use App\Entity\Content;
use App\Entity\Member;
use App\Entity\Pole;
use App\Entity\Event;
use App\Entity\BarProductType;
use App\Entity\Section;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BDEIndexController extends AbstractController
{
    /**
     * @Route("/bde", name="bde_index")
     */
    public function index(Request $request)
    {
        $navDescription = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale());
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description","BDE", $request->getLocale());
        $poles = $this->getDoctrine()->getRepository(Pole::class)->findBySectionName("BDE");
        return $this->render('bde/index.html.twig', [
            'controller_name' => 'BDEIndexController',
            "description" => $description,
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale()),
            "poles" => $poles
        ]);
    }

    /**
     * @Route({
     *     "en": "/bde/bar",
     *     "fr": "/bde/traq"
     * }, name="bde_bar")
     */
    public function bar(Request $request)
    {
        $producttypes = $this->getDoctrine()->getRepository(BarProductType::class)->findAll();
        return $this->render('bde/bar.html.twig', [
            'controller_name' => 'BDEIndexController',
            "lang" => $request->getLocale(),
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale()),
            "product_types" => $producttypes
        ]);
    }

    /**
     * @Route({
     *     "en": "/bde/events",
     *     "fr": "/bde/evenements"
     * }, name="bde_events")
     */
    public function events(Request $request)
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->findEventsToComeBySectionName("BDE");
        return $this->render('bde/events.html.twig', [
            'controller_name' => 'BDEIndexController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale()),
            "lang" => $request->getLocale(),
            "events" => $events,
        ]);
    }

    /**
     * @Route({
     *     "en": "/bde/planning",
     *     "fr": "/bde/planning"
     * }, name="bde_planning")
     */
    public function planning(Request $request)
    {
        return $this->render('bde/planning.html.twig', [
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale()),
            'controller_name' => 'BDEIndexController',
        ]);
    }
}
