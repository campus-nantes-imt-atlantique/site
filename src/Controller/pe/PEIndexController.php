<?php

namespace App\Controller\pe;

use App\Entity\Content;
use App\Entity\Journal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PEIndexController extends AbstractController
{
    /**
     * @Route("/pe", name="pe_index")
     */
    public function index(Request $request)
    {
        $description = $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("description","PE", $request->getLocale());
        return $this->render('pe/index.html.twig', [
            'controller_name' => 'PEIndexController',
            "description" => $description,
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","PE", $request->getLocale())
        ]);
    }

    /**
     * @Route({
     *     "en": "/pe/list",
     *     "fr": "/pe/liste"
     * }, name="pe_list")
     */
    public function list(Request $request)
    {
        $journaux = $this->getDoctrine()->getRepository(Journal::class)->findBy( array(), array('edition' => 'DESC')); // Find all, with edition decreasing
        return $this->render('pe/list.html.twig', [
            'controller_name' => 'PEIndexController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","PE", $request->getLocale()),
            "journaux" => $journaux
        ]);
    }

    /**
     * @Route({
     *     "en": "/pe/lire/{edition}",
     *     "fr": "/pe/read/{edition}"
     * }, name="pe_read", requirements={"page"="{\d+:\d+\}"})
     */
    // L'édition doit correspondre à un nombre
    public function read(Request $request, int $edition)
    {
        $journal = $this->getDoctrine()->getRepository(Journal::class)->findOneBy(['edition' => $edition]);
        return $this->render('pe/read.html.twig', [
            'controller_name' => 'PEIndexController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","PE", $request->getLocale()),
            "journal" => $journal
        ]);
    }
}
