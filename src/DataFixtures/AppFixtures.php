<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Projects;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        for ($i=0; $i < 3; $i++) { 
           
            $project = new Projects();
            $project->setName("Nom" . $i);
            $project->setDescription("blablabla" . $i);
            $project->setStart(date_create_immutable("now"));
            $project->setEnd(date_create_immutable("now"));
            $project->setLogo('https://via.placeholder.com/150');
            $project->setTeam();
            $manager->persist($project);

        }
        
        $manager->flush();
    }
}
