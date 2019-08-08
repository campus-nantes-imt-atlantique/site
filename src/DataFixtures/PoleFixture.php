<?php

namespace App\DataFixtures;

use App\Entity\Pole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PoleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $pole = new Pole();
        $pole->setName("Pôle communication");
        $pole->setSection($this->getReference(SectionFixture::BDS_SECTION_REFERENCE));
        $manager->flush();
    }
}
