<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;

class UserController extends AbstractController
{
    //récup tous les utilisateurs
    #[Route('/user-list', name: 'list-user')]
    public function list(): Response
    {
        $users = $this->getDoctrine()
        ->getRepository(Users::class)
        ->findAll();
        
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }

    //récup l'utilisateur via l'id passé dans l'URI et l'injecte dans la vue
    #[Route('/user-detail/{id}', name: 'detail-user')]
    public function detail(int $id): Response
    {
        $user = $this->getDoctrine()
        ->getRepository(Users::class)
        ->find($id);

        if (!$user) {
        throw $this->createNotFoundException(
            'No user found for id '.$id
        );
        }

    // return new Response('Check out this great user: '.$user->getUsername());

    // or render a template
    // in the template, print things with {{ user.username }}
    return $this->render('user/detail.html.twig', ['user' => $user]);
    }

    // ajoute un utilisateurs
    #[Route('/user/add', name: 'newuser')]
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
