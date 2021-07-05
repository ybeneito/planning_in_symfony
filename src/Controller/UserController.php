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
    return $this->render('user/detail.html.twig', ['user' => $user]);
    }

  
}
