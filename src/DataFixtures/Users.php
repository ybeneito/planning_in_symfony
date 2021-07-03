<?php

namespace App\DataFixtures;

use App\Entity\Users as EntityUsers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class Users extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        //creation de 3 personnes
        for ($i=0; $i < 3 ; $i++) { 
            $user = new EntityUsers();
            $user->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setEmail($faker->email())
                ->setLogo($faker->imageUrl(150,150))
                ->setUsername($faker->word())
                ->setPassword($faker->password());
            $manager->persist($user);
        }

        $manager->flush();
    }
}
