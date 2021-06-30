<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user-list', name: 'list-user')]
    public function list(): Response
    {
        return $this->render('user/list.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user-detail', name: 'detail-user')]
    public function detail(): Response
    {
        return $this->render('user/detail.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
