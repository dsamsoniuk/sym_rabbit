<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppUser extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher){

    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("damian@poczta.pl");
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'damian'));
        $manager->persist($user);

        $manager->flush();
    }
}
