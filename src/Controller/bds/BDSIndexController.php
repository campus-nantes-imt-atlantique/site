<?php

namespace App\Controller\bds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BDSIndexController extends AbstractController
{
    /**
     * @Route("/bds", name="bds_index")
     */
    public function index()
    {
        return $this->render('bds/index.html.twig', [
            'controller_name' => 'BDSIndexController',
        ]);
    }

    /**
     * @Route({
     *     "en": "/bds/leaders",
     *     "fr": "/bds/responsables"
     * }, name="bds_leaders")
     */
    public function leaders()
    {
        $leaders = array(
            "Athlétisme relais" => ["Valentin Jacques"],
            "Athlétisme cross" => ["Adrien Delbroeuve"],
            "Badminton" => ["Adrien Delbroeuve"],
            "Basket F" => ["Miora Frossard" , "Clarisse Lê"],
            "Basket M" => ["Clément André" , " Abdessamad Ghilane"],
            "Danse" => ["Anna Rogova"],
            "Equitation" => ["?"],
            "Escalade" => ["Ismaël Benkirane"],
            "Fitness" => ["Anna Rogova"],
            "Foot F" => ["Manon Geniesse" , "Maeliss Guibert"],
            "Foot M" => ["Nicolas Chauveau" , "Ilias Amal"],
            "Golf" => ["Stanislas Roger" , "Mathieu Cazes"],
            "Hand F" => ["Elsa Fourneau"],
            "Hand M" => ["Luc Cerisy" , "Arthur Chauvin"],
            "Hip-Hop" => ["?"],
            "Boxe" => ["Thomas Herbelin"],
            "Natation " => ["Mathieu Cazes"],
            "Pompom" => ["Pauline Lery" , "Caroline de Pourtales"],
            "Rugby F" => ["Albane de Verdière" , "Léa Louesdon"],
            "Rugby M" => ["Maxime Zeidenberg" , "Alexandre Naudi"],
            "Tennis" => ["Baptiste Guimard"],
            "Volley F" => ["Jeanne Thévenin"],
            "Volley M" => ["Romain Goldsztajn" , "Kevin Thiebaut"],
            "Musculation" => ["Quentin Marinelli"],
            "Tennis de table" => ["Valentin Jacques"],
            "Escrime" => ["Maximilien Bertaux"],
            "Aviron" => ["Pierre Malécot ?"],
            "Voile" => ["?"],
            "Ultimate" => ["Alexis Schneider,Valentin Jacques"],
            "VTT/Raid" => ["?"]
        );
        return $this->render('bds/leaders.html.twig', [
            'controller_name' => 'BDSIndexController',
            'leaders' => $leaders
        ]);
    }

    /**
     * @Route({
     *     "en": "/bds/planning",
     *     "fr": "/bds/planning"
     * }, name="bds_planning")
     */
    public function planning()
    {
        return $this->render('bds/planning.html.twig', [
            'controller_name' => 'BDSIndexController',
        ]);
    }
}
