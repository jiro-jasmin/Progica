<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use App\Entity\Gite;
use App\Entity\Region;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class GiteFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
        $equipements = [];
        $regions = [];
        $proprios = [];

        // Equipements
        $equip1 = new Equipement();
        $equip1->setName('lave-linge');
        $manager->persist($equip1);

        $equip2 = new Equipement();
        $equip2->setName('lave-vaisselle');
        $manager->persist($equip2);

        $equip3 = new Equipement();
        $equip3->setName('climatisation');
        $manager->persist($equip3);

        $equip4 = new Equipement();
        $equip4->setName('télévision');
        $manager->persist($equip4);

        $manager->flush();

        array_push($equipements, $equip1, $equip2, $equip3, $equip4);

        // Regions
        $region1 = new Region();
        $region1->setNom('Auvergne-Rhône-Alpes');
        $manager->persist($region1);

        $region2 = new Region();
        $region2->setNom('Bourgogne-Franche-Comté');
        $manager->persist($region2);

        $region3 = new Region();
        $region3->setNom('Bretagne');
        $manager->persist($region3);

        $region4 = new Region();
        $region4->setNom('Centre-Val de Loire');
        $manager->persist($region4);

        $region5 = new Region();
        $region5->setNom('Corse');
        $manager->persist($region5);

        $region6 = new Region();
        $region6->setNom('Grand Est');
        $manager->persist($region6);

        $region7 = new Region();
        $region7->setNom('Hauts-de-France');
        $manager->persist($region7);

        $region8 = new Region();
        $region8->setNom('Île-de-France');
        $manager->persist($region8);

        $region9 = new Region();
        $region9->setNom('Normandie');
        $manager->persist($region9);

        $region10 = new Region();
        $region10->setNom('Nouvelle-Aquitaine');
        $manager->persist($region10);

        $region11 = new Region();
        $region11->setNom('Occitanie');
        $manager->persist($region11);

        $region12 = new Region();
        $region12->setNom('Pays de la Loire');
        $manager->persist($region12);

        $region13 = new Region();
        $region13->setNom('Provence-Alpes-Côte d\'Azur');
        $manager->persist($region13);

        $manager->flush();
        array_push($regions, $region1, $region2, $region3, $region4, $region5, $region6, $region7, $region8, $region9, $region10, $region11, $region12, $region13);

        // Proprietaires
        $proprio1 = new User();
        $proprio1
            ->setUsername("Pierre")
            ->setPassword($this->hasher->hashPassword($proprio1, "doe"))
            ->setRoles(["ROLE_USER"])
            ->setEmail("pierre@doe.com");;
        $manager->persist($proprio1);

        $proprio2 = new User();
        $proprio2
            ->setUsername("Paul")
            ->setPassword($this->hasher->hashPassword($proprio2, "doe"))
            ->setRoles(["ROLE_USER"])
            ->setEmail("paul@doe.com");;
        $manager->persist($proprio2);

        $proprio3 = new User();
        $proprio3
            ->setUsername("Jacques")
            ->setPassword($this->hasher->hashPassword($proprio3, "doe"))
            ->setRoles(["ROLE_USER"])
            ->setEmail("jacques@doe.com");;
        $manager->persist($proprio3);

        $manager->flush();
        array_push($proprios, $proprio1, $proprio2, $proprio3);

        // Gites
        for ($i = 1; $i < 20; $i++) {
            $gite = new Gite();
            $gite
                ->setNom('Gite ' . $i)
                ->setDescription('Voici le gite numéro ' . $i)
                ->setSurface(random_int(50, 200))
                ->setChambre(random_int(1, 10))
                ->setCouchage(random_int(3, 15))
                ->addEquipement($faker->randomElement($equipements))
                ->setTarifHebdo($faker->numberBetween(100, 500))
                ->setRegion($faker->randomElement($regions))
                ->setAdresse('123 Chemin aleatoire Inconnuville')
                ->setProprietaire($faker->randomElement($proprios));

            $manager->persist($gite);
        }

        $manager->flush();
    }
}
