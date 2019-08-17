<?php

namespace App\DataFixtures;

use App\Entity\Pole;
use App\Entity\Section;
use App\Entity\SportPlanning;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SportPlanningFixture extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $sportPlanning = new SportPlanning();
        $sportPlanning->setStart(DateTime::createFromFormat('H:i:s', '18:00:00'));
        $sportPlanning->setEnd(DateTime::createFromFormat('H:i:s', '20:00:00'));
        $sportPlanning->setColor('#159BD7');
        $sportPlanning->setDay($this->getReference(DayFixture::MONDAY_REFERENCE));
        $sportPlanning->setSport($this->getReference(SportFixture::TENNIS_SPORT));
        $manager->persist($sportPlanning);

        $sportPlanning = new SportPlanning();
        $sportPlanning->setStart(DateTime::createFromFormat('H:i:s', '19:00:00'));
        $sportPlanning->setEnd(DateTime::createFromFormat('H:i:s', '20:30:00'));
        $sportPlanning->setColor('#D15E5E');
        $sportPlanning->setDay($this->getReference(DayFixture::MONDAY_REFERENCE));
        $sportPlanning->setSport($this->getReference(SportFixture::BADMINTON_SPORT));
        $manager->persist($sportPlanning);

        $sportPlanning = new SportPlanning();
        $sportPlanning->setStart(DateTime::createFromFormat('H:i:s', '20:00:00'));
        $sportPlanning->setEnd(DateTime::createFromFormat('H:i:s', '22:00:00'));
        $sportPlanning->setColor('#5E79D1');
        $sportPlanning->setDay($this->getReference(DayFixture::MONDAY_REFERENCE));
        $sportPlanning->setSport($this->getReference(SportFixture::FOOT_M_SPORT));
        $manager->persist($sportPlanning);


        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return array(
            SportFixture::class,
        );
    }
}
