<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Teams as EntityTeams;
use App\Entity\Projects as EntityProject;

class Teams extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        
        //creation de 3 teams
        for ($i=0; $i < 3 ; $i++) { 
            $team = new EntityTeams();
            $team->setName($faker->word())
                ->setSlogan("La team" . $i)
                ->setLogo($faker->imageUrl(150,150));
                $manager->persist($team);
           
           
        }

        $manager->flush();
    }
}

