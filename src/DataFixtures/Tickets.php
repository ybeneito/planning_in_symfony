<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Tickets as EntityTickets;
use App\Entity\Users as EntityUser;

class Tickets extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
        $faker = Faker\Factory::create('fr_FR');

        //creation de 3 personnes
        for ($i=0; $i < 3 ; $i++) { 
            $project = new EntityTickets();
            $project->setEnd($faker->dateTime())
                    ->setStatus(1)
                    ->setTag(1234);
            $manager->persist($project);
        }

        $manager->flush();
    }
}
