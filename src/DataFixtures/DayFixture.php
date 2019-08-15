<?php

namespace App\DataFixtures;

use App\Entity\Day;
use App\Entity\Pole;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DayFixture extends Fixture
{

    public const MONDAY_REFERENCE = 'MONDAY_REFERENCE';
    public const TUESDAY_REFERENCE = 'TUESDAY_REFERENCE';
    public const WEDNESDAY_REFERENCE = 'WEDNESDAY_REFERENCE';
    public const THURSDAY_REFERENCE = 'THURSDAY_REFERENCE';
    public const FRIDAY_REFERENCE = 'FRIDAY_REFERENCE';
    public const SATURDAY_REFERENCE = 'SATURDAY_REFERENCE';
    public const SUNDAY_REFERENCE = 'SUNDAY_REFERENCE';

    public function load(ObjectManager $manager)
    {
        $day = new Day();
        $day->setName("Lundi", "Monday");
        $manager->persist($day);
        $this->addReference(DayFixture::MONDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Mardi", "Tuesday");
        $manager->persist($day);
        $this->addReference(DayFixture::TUESDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Mercredi", "Wednesday");
        $manager->persist($day);
        $this->addReference(DayFixture::WEDNESDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Jeudi", "Thursday");
        $manager->persist($day);
        $this->addReference(DayFixture::THURSDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Vendredi", "Friday");
        $manager->persist($day);
        $this->addReference(DayFixture::FRIDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Samedi", "Saturday");
        $manager->persist($day);
        $this->addReference(DayFixture::SATURDAY_REFERENCE, $day);
        $day = new Day();
        $day->setName("Dimanche", "Sunday");
        $manager->persist($day);
        $this->addReference(DayFixture::SUNDAY_REFERENCE, $day);

        $manager->flush();
    }

}
