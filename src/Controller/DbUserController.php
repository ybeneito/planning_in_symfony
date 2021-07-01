<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DbUserController extends AbstractController
{
     /**
     * @Route("/new/user", name="newuser")
     */
    public function createUser(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $user = new Users();
        $user->setFirstname('AAA');
        $user->setLastname('ZZZZ');
        $user->setEmail('y.benei@gmail.com');
        $user->setLogo('https://via.placeholder.com/150');
        $user->setUsername('wazzz');
        $user->setPassword('azertyuiop');

       
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new user with id '.$user->getId());
    }

   
}
