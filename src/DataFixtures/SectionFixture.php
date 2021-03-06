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
    public const PE_SECTION_REFERENCE = 'pe-section';

    public function load(ObjectManager $manager)
    {
        $bdsSection = new Section();
        $bdsSection->setName("BDS");
        $manager->persist($bdsSection);
        $this->addReference(self::BDS_SECTION_REFERENCE, $bdsSection);

        $bdaSection = new Section();
        $bdaSection->setName("BDA");
        $manager->persist($bdaSection);
        $this->addReference(self::BDA_SECTION_REFERENCE, $bdaSection);

        $bdeSection = new Section();
        $bdeSection->setName("BDE");
        $manager->persist($bdeSection);
        $this->addReference(self::BDE_SECTION_REFERENCE, $bdeSection);

        $jeSection = new Section();
        $jeSection->setName("JE");
        $manager->persist($jeSection);
        $this->addReference(self::JE_SECTION_REFERENCE, $jeSection);

        $peSection = new Section();
        $peSection->setName("PE");
        $manager->persist($peSection);
        $this->addReference(self::PE_SECTION_REFERENCE, $peSection);

        $manager->flush();
    }
}
