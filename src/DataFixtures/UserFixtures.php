<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));

        $user->setRoles(["ROLE_ADMIN"]);

        $user->setEmail('admin@imt.fr');

        $user->setUsername('admin');

        $user->setEnabled(true);

        $manager->persist($user);

        $manager->flush();
    }
}
