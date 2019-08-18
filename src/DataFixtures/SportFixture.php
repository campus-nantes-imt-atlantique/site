<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SportFixture extends Fixture
{


    public const TENNIS_SPORT = 'tennis-sport';
    public const FOOT_M_SPORT = 'foot-m-sport';
    public const FOOT_F_SPORT = 'foot-f-sport';
    public const BADMINTON_SPORT = 'badminton-sport';

    public function load(ObjectManager $manager)
    {

        $sport = new Sport("Athlétisme relais",["Valentin Jacques"],null);
        $sport->setColor('#D79B15');
        $manager->persist($sport);
        $sport = new Sport("Athlétisme cross",["Adrien Delbroeuve"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Badminton",["Adrien Delbroeuve"],null);
        $sport->setColor('#D15EB2');
        $this->addReference(SportFixture::BADMINTON_SPORT,$sport);
        $manager->persist($sport);
        $sport = new Sport("Escalade",["Ismaël Benkirane"],$sport);
        $sport->setColor('#D15E5E');
        $manager->persist($sport);
        $sport = new Sport("Basket F",["Miora Frossard" , "Clarisse Lê"],null);
        $sport->setColor('#15D7C8');
        $manager->persist($sport);
        $sport = new Sport("Basket M",["Clément André" , " Abdessamad Ghilane"],null);
        $sport->setColor('#5ED18A');
        $manager->persist($sport);
        $sport = new Sport("Danse",["Anna Rogova"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Hip-Hop",["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Musculation",["Quentin Marinelli"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Fitness",["Anna Rogova"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Foot F",["Manon Geniesse" , "Maeliss Guibert"],null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_F_SPORT,$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Foot M", ["Nicolas Chauveau" , "Ilias Amal"],null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_M_SPORT,$sport);
        $manager->persist($sport);
        $sport = new Sport("Golf",["Stanislas Roger" , "Mathieu Cazes"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Hand F",["Elsa Fourneau"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Volley F",["Jeanne Thévenin"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Hand M",["Luc Cerisy" , "Arthur Chauvin"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Volley M",["Romain Goldsztajn" , "Kevin Thiebaut"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Boxe",["Thomas Herbelin"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Tennis",["Baptiste Guimard"],$sport);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::TENNIS_SPORT,$sport);
        $manager->persist($sport);
        $sport = new Sport("Natation",["Mathieu Cazes"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Escrime",["Maximilien Bertaux"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Pompom",["Pauline Lery" , "Caroline de Pourtales"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Rugby F",["Albane de Verdière" , "Léa Louesdon"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Rugby M",["Maxime Zeidenberg" , "Alexandre Naudi"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Aviron",["Pierre Malécot"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Voile",["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Ultimate", ["Alexis Schneider","Valentin Jacques"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("VTT/Raid", ["?"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Equitation", ["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = new Sport("Tennis de table", ["Valentin Jacques"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $manager->flush();
    }
}
