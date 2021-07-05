<?php

namespace App\DataFixtures;

use App\Entity\Secuser as EntitySecuser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class Secuser extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;        
    }

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

            //ajout d'un Secuser avec les datas données     
            $user = new EntitySecuser();
            $user->setEmail($email = 'y.beneito@gmail.fr')
                ->setRoles($roles = ['ROLE_ADMIN'])
                ->setPassword($this->passwordHasher->hashPassword($user,'123456waz'));
            $manager->persist($user);
        

        $manager->flush();
    }
}
