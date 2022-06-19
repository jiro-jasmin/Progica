<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin
            ->setUsername("admin")
            ->setPassword($this->hasher->hashPassword($admin, "admin"))
            ->setRoles(["ROLE_ADMIN"])
            ->setEmail("admin@admin.com");

        $manager->persist($admin);

        $user = new User();
        $user
            ->setUsername("john")
            ->setPassword($this->hasher->hashPassword($user, "doe"))
            ->setRoles(["ROLE_USER"])
            ->setEmail("john@doe.com");;

        $manager->persist($user);

        $manager->flush();
    }
}
