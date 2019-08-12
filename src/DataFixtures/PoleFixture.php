<?php

namespace App\DataFixtures;

use App\Entity\Pole;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PoleFixture extends Fixture implements DependentFixtureInterface
{


    public const BDS_COMMUNICATION_POLE_REFERENCE = 'bde-com-pole';

    public function load(ObjectManager $manager)
    {
        $pole = new Pole();
        $pole->setName("Pôle communication");
        $pole->setSection($this->getReference(SectionFixture::BDS_SECTION_REFERENCE));
        $this->setReference(self::BDS_COMMUNICATION_POLE_REFERENCE,$pole);
        $manager->persist($pole);

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
            SectionFixture::class,
        );
    }
}
