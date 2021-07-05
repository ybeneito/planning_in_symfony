<?php

namespace App\Controller;

use App\Entity\Teams;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    #[Route('/team-list', name: 'list-team')]
    public function list(): Response
    {
        $teams = $this->getDoctrine()
        ->getRepository(Teams::class)
        ->findAll();
        
        return $this->render('team/list.html.twig', [
            'teams' => $teams
        ]);
    }

    #[Route('/team-detail/{id}', name: 'detail-team')]
    public function detail(int $id): Response
    {
        $team = $this->getDoctrine()
        ->getRepository(Teams::class)
        ->find($id);
        
        return $this->render('team/detail.html.twig', [
            'team' => $team
        ]);
    }
}


