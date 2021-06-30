<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(): Response
    {
        return $this->render('connect/login.html.twig', [
            'controller_name' => 'ConnectController',
        ]);
    }
    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        return $this->render('connect/logout.html.twig', [
            'controller_name' => 'ConnectController',
        ]);
    }
    #[Route('/signin', name: 'signin')]
    public function signin(): Response
    {
        return $this->render('connect/signin.html.twig', [
            'controller_name' => 'ConnectController',
        ]);
    }
}
