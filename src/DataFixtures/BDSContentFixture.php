<?php

namespace App\DataFixtures;

use App\Entity\BDSContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BDSContentFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $bdsContent = new BDSContent();
        $bdsContent->setContentKey("description");
        $bdsContent->setContentFr("Le BDS, ou Bureau des Sports est l’Association Sportive de l’école. L’équipe est composée de 18 élèves, et a pour mission de gérer toute la pratique de sports extrascolaires, comme l’organisation des entraînements, du voyage au ski, ou la participation aux différents championnats et tournois. L’événement sportif phare de l’année sur le campus d’IMT Atlantique est l’Everest Race, course à obstacles caritative organisée par un petit groupe d’élèves de l’école, dans le cadre d’un projet associatif de première année. Elle a pour but de récolter des fonds (3745€ l’année dernière) pour l’association A chacun son Everest, qui fait voyager les enfants atteints de leucémie ou cancer. Cette course se déroulera cette année le 20 octobre, et aura 10 obstacles allant de la forêt de cordes au tir à la carabine. ");
        $bdsContent->setContentEn("Not translated");
        $manager->persist($bdsContent);

        $manager->flush();
    }
}
