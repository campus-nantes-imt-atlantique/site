<?php

namespace App\DataFixtures;

use App\Entity\Member;
use App\Entity\Pole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MemberFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $member = new Member();
        $member->setFirstName("Jean");
        $member->setLastName("Sebastien");
        $member->setPole($this->getReference(PoleFixture::BDS_COMMUNICATION_POLE_REFERENCE));
        $manager->persist($member);
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
            PoleFixture::class,
        );
    }
}
