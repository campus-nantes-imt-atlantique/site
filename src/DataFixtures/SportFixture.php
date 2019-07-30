<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SportFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sportLeaders = array(
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
        foreach ($sportLeaders as $sportName => $leaderNames){
            $sport = new Sport();
            $sport->setLeaders($leaderNames);
            $sport->setName($sportName);
            $manager->persist($sport);
        }
        $manager->flush();
    }
}
