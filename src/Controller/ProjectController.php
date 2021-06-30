<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project-list', name: 'list-project')]
    public function list(): Response
    {
        return $this->render('project/list.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/project-detail', name: 'detail-project')]
    public function detail(): Response
    {
        return $this->render('project/detail.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
