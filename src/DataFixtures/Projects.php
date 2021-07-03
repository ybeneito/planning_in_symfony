<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Projects as EntityProject;
use Faker;
use Faker\Factory;

class Projects extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        $faker = Faker\Factory::create('fr_FR');
         //creation de 3 projects
         for ($j=0; $j < 3 ; $j++) { 
            $project = new EntityProject();
            $project->setName($faker->word())
                ->setDescription($faker->word())
                ->setLogo($faker->imageUrl(150,150))
                ->setStart($faker->dateTime())
                ->setEnd($faker->dateTime());
                $manager->persist($project);
        }
        $manager->flush();
    }
}
