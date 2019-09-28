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

        $sport = Sport::withValues("Athlétisme relais",array(),null);
        $sport->setColor('#D79B15');
        $manager->persist($sport);
        $sport = Sport::withValues("Athlétisme cross",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Badminton",array(),null);
        $sport->setColor('#D15EB2');
        $this->addReference(SportFixture::BADMINTON_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Escalade",array(),$sport);
        $sport->setColor('#D15E5E');
        $manager->persist($sport);
        $sport = Sport::withValues("Basket F",array(),null);
        $sport->setColor('#15D7C8');
        $manager->persist($sport);
        $sport = Sport::withValues("Basket M",array(),null);
        $sport->setColor('#5ED18A');
        $manager->persist($sport);
        $sport = Sport::withValues("Danse",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hip-Hop",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Musculation",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Fitness",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Foot F",array(),null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_F_SPORT,$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Foot M", array(),null);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::FOOT_M_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Golf",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hand F",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Volley F",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Hand M",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Volley M",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Boxe",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Tennis",array(),$sport);
        $sport->setColor('#159BD7');
        $this->addReference(SportFixture::TENNIS_SPORT,$sport);
        $manager->persist($sport);
        $sport = Sport::withValues("Natation",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Escrime",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Pompom",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Rugby F",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Rugby M",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Aviron",array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Voile",array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Ultimate", array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("VTT/Raid", array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Equitation", array(),$sport);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $sport = Sport::withValues("Tennis de table", array(),null);
        $sport->setColor('#159BD7');
        $manager->persist($sport);
        $manager->flush();
    }
}
