<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    #[Route('/team-list', name: 'list-team')]
    public function list(): Response
    {
        return $this->render('team/list.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/team-detail', name: 'detail-team')]
    public function detail(): Response
    {
        return $this->render('team/detail.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
