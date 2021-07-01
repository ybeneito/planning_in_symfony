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

    #[Route('/team/add', name: 'newteam')]
    public function createTeam(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $team = new Teams();
        $team->setName('La New Team');
        $team->setSlogan('jdqskfljmlfjqkfjqfqdlfq');
        $team->setLogo('https://via.placeholder.com/150');

       
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($team);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new user with id '.$team->getId());
    }
}


