<?php

namespace App\DataFixtures;

use App\Entity\Journal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JournalFixture extends Fixture
{

    public const EDITION_1 = 'journal-1';
    public const EDITION_2 = 'journal-2';
    public const EDITION_3 = 'journal-3';
    public const EDITION_4 = 'journal-4';
    public const EDITION_5 = 'journal-5';
    public const EDITION_6 = 'journal-6';

    public function load(ObjectManager $manager)
    {
        $journal1 = new Journal();
        $journal1->setEdition(1);
	    $journal1->setImage("1.jpg");
	    $journal1->setFile("1.pdf");
        $journal1->updateDate();
        $manager->persist($journal1);
        $this->addReference(self::EDITION_1, $journal1);

        $journal2 = new Journal();
        $journal2->setEdition(2);
        $journal2->setImage("2.jpg");
        $journal2->setFile("2.pdf");
        $journal2->updateDate();
        $manager->persist($journal2);
        $this->addReference(self::EDITION_2, $journal2);

        $journal3 = new Journal();
        $journal3->setEdition(3);
        $journal3->setImage("3.jpg");
        $journal3->setFile("3.pdf");
        $journal3->updateDate();
        $manager->persist($journal3);
        $this->addReference(self::EDITION_3, $journal3);

        $journal4 = new Journal();
        $journal4->setEdition(4);
        $journal4->setImage("4.jpg");
        $journal4->setFile("4.pdf");
        $journal4->updateDate();
        $manager->persist($journal4);
        $this->addReference(self::EDITION_4, $journal4);

        $journal5 = new Journal();
        $journal5->setEdition(5);
        $journal5->setImage("5.jpg");
        $journal5->setFile("5.pdf");
        $journal5->updateDate();
        $manager->persist($journal5);
        $this->addReference(self::EDITION_5, $journal5);

        $journal6 = new Journal();
        $journal6->setEdition(6);
        $journal6->setImage("6.jpg");
        $journal6->setFile("6.pdf");
        $journal6->updateDate();
        $manager->persist($journal6);
        $this->addReference(self::EDITION_6, $journal6);

        $manager->flush();
    }
}
