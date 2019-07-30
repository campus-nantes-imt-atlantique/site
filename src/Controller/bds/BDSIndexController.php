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
            "Athlétisme relais et cross" => ["Valentin Jacques","Adrien Delbroeuve"],
            "Badminton et Escalade" => ["Adrien Delbroeuve","Ismaël Benkirane"],
            "Basket F" => ["Miora Frossard" , "Clarisse Lê"],
            "Basket M" => ["Clément André" , " Abdessamad Ghilane"],
            "Danse et Hip-Hop" => ["Anna Rogova","?"],
            "Musculation et Fitness" => ["Quentin Marinelli","Anna Rogova"],
            "Foot F" => ["Manon Geniesse" , "Maeliss Guibert"],
            "Foot M" => ["Nicolas Chauveau" , "Ilias Amal"],
            "Golf" => ["Stanislas Roger" , "Mathieu Cazes"],
            "Hand F et Volley F" => ["Elsa Fourneau","Jeanne Thévenin"],
            "Hand M" => ["Luc Cerisy" , "Arthur Chauvin"],
            "Volley M" => ["Romain Goldsztajn" , "Kevin Thiebaut"],
            "Boxe et Tennis" => ["Thomas Herbelin","Baptiste Guimard"],
            "Natation et Escrime" => ["Mathieu Cazes","Maximilien Bertaux"],
            "Pompom" => ["Pauline Lery" , "Caroline de Pourtales"],
            "Rugby F" => ["Albane de Verdière" , "Léa Louesdon"],
            "Rugby M" => ["Maxime Zeidenberg" , "Alexandre Naudi"],
            "Aviron et Voile" => ["Pierre Malécot","?"],
            "Ultimate" => ["Alexis Schneider","Valentin Jacques"],
            "VTT/Raid et Equitation" => ["?","?"],
            "Tennis de table" => ["Valentin Jacques"],
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
