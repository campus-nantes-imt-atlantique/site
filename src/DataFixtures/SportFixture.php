<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SportFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $sport = new Sport("Athlétisme relais",["Valentin Jacques"],null);
        $manager->persist($sport);
        $sport = new Sport("Athlétisme cross",["Adrien Delbroeuve"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Badminton",["Adrien Delbroeuve"],null);
        $manager->persist($sport);
        $sport = new Sport("Escalade",["Ismaël Benkirane"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Basket F",["Miora Frossard" , "Clarisse Lê"],null);
        $manager->persist($sport);
        $sport = new Sport("Basket M",["Clément André" , " Abdessamad Ghilane"],null);
        $manager->persist($sport);
        $sport = new Sport("Danse",["Anna Rogova"],null);
        $manager->persist($sport);
        $sport = new Sport("Hip-Hop",["?"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Musculation",["Quentin Marinelli"],null);
        $manager->persist($sport);
        $sport = new Sport("Fitness",["Anna Rogova"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Foot F",["Manon Geniesse" , "Maeliss Guibert"],null);
        $manager->persist($sport);
        $sport = new Sport("Foot M", ["Nicolas Chauveau" , "Ilias Amal"],null);
        $manager->persist($sport);
        $sport = new Sport("Golf",["Stanislas Roger" , "Mathieu Cazes"],null);
        $manager->persist($sport);
        $sport = new Sport("Hand F",["Elsa Fourneau"],null);
        $manager->persist($sport);
        $sport = new Sport("Volley F",["Jeanne Thévenin"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Hand M",["Luc Cerisy" , "Arthur Chauvin"],null);
        $manager->persist($sport);
        $sport = new Sport("Volley M",["Romain Goldsztajn" , "Kevin Thiebaut"],null);
        $manager->persist($sport);
        $sport = new Sport("Boxe",["Thomas Herbelin"],null);
        $manager->persist($sport);
        $sport = new Sport("Tennis",["Baptiste Guimard"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Natation",["Mathieu Cazes"],null);
        $manager->persist($sport);
        $sport = new Sport("Escrime",["Maximilien Bertaux"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Pompom",["Pauline Lery" , "Caroline de Pourtales"],null);
        $manager->persist($sport);
        $sport = new Sport("Rugby F",["Albane de Verdière" , "Léa Louesdon"],null);
        $manager->persist($sport);
        $sport = new Sport("Rugby M",["Maxime Zeidenberg" , "Alexandre Naudi"],null);
        $manager->persist($sport);
        $sport = new Sport("Aviron",["Pierre Malécot"],null);
        $manager->persist($sport);
        $sport = new Sport("Voile",["?"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Ultimate", ["Alexis Schneider","Valentin Jacques"],null);
        $manager->persist($sport);
        $sport = new Sport("VTT/Raid", ["?"],null);
        $manager->persist($sport);
        $sport = new Sport("Equitation", ["?"],$sport);
        $manager->persist($sport);
        $sport = new Sport("Tennis de table", ["Valentin Jacques"],null);
        $manager->persist($sport);
        $manager->flush();
    }
}
