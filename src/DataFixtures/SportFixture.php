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

        $sport = Sport::withValues("Athlétisme relais",["Valentin Jacques"],null);
        $sport->setColor('#D79B15');
        $manager->persist($sport);
        $sport = Sport::withValues("Athlétisme cross",["Adrien Delbroeuve"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Badminton",["Adrien Delbroeuve"],null);
        $sport->setColor('#D15EB2');
        $this->addReference(SportFixture::BADMINTON_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Escalade",["Ismaël Benkirane"],$sport);
        $sport->setColor('#D15E5E');
        $manager->persist($sport);
        $sport = Sport::withValues("Basket F",["Miora Frossard" , "Clarisse Lê"],null);
        $sport->setColor('#15D7C8');
        $manager->persist($sport);
        $sport = Sport::withValues("Basket M",["Clément André" , " Abdessamad Ghilane"],null);
        $sport->setColor('#5ED18A');
        $manager->persist($sport);
        $sport = Sport::withValues("Danse",["Anna Rogova"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hip-Hop",["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Musculation",["Quentin Marinelli"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Fitness",["Anna Rogova"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Foot F",["Manon Geniesse" , "Maeliss Guibert"],null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_F_SPORT,$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Foot M", ["Nicolas Chauveau" , "Ilias Amal"],null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_M_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Golf",["Stanislas Roger" , "Mathieu Cazes"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hand F",["Elsa Fourneau"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Volley F",["Jeanne Thévenin"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hand M",["Luc Cerisy" , "Arthur Chauvin"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Volley M",["Romain Goldsztajn" , "Kevin Thiebaut"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Boxe",["Thomas Herbelin"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Tennis",["Baptiste Guimard"],$sport);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::TENNIS_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Natation",["Mathieu Cazes"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Escrime",["Maximilien Bertaux"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Pompom",["Pauline Lery" , "Caroline de Pourtales"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Rugby F",["Albane de Verdière" , "Léa Louesdon"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Rugby M",["Maxime Zeidenberg" , "Alexandre Naudi"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Aviron",["Pierre Malécot"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Voile",["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Ultimate", ["Alexis Schneider","Valentin Jacques"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("VTT/Raid", ["?"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Equitation", ["?"],$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Tennis de table", ["Valentin Jacques"],null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $manager->flush();
    }
}
