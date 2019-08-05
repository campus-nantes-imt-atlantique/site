<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SectionFixture extends Fixture
{

    public const BDE_SECTION_REFERENCE = 'bde-section';
    public const BDS_SECTION_REFERENCE = 'bds-section';
    public const BDA_SECTION_REFERENCE = 'bda-section';
    public const JE_SECTION_REFERENCE = 'je-section';

    public function load(ObjectManager $manager)
    {
        $bdsSection = new Section("BDS");
        $manager->persist($bdsSection);
        $this->addReference(self::BDS_SECTION_REFERENCE, $bdsSection);

        $bdaSection = new Section("BDA");
        $manager->persist($bdaSection);
        $this->addReference(self::BDA_SECTION_REFERENCE, $bdaSection);

        $bdeSection = new Section("BDE");
        $manager->persist($bdeSection);
        $this->addReference(self::BDE_SECTION_REFERENCE, $bdeSection);

        $jeSection = new Section("JE");
        $manager->persist($jeSection);
        $this->addReference(self::JE_SECTION_REFERENCE, $jeSection);

        $manager->flush();
    }
}
