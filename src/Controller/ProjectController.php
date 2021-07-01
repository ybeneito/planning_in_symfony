<?php

namespace App\Controller;

use App\Entity\Projects;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class ProjectController extends AbstractController
{
    #[Route('/project-list', name: 'list-project')]
    public function list(): Response
    {
        $projects = $this->getDoctrine()
        ->getRepository(Projects::class)
        ->findAll();
        return $this->render('project/list.html.twig', [
            'projects' => $projects
        ]);
    }

    #[Route('/project-detail/{id}', name: 'detail-project')]
    public function detail(int $id): Response
    {
        $project = $this->getDoctrine()
        ->getRepository(Projects::class)
        ->find($id);

        if (!$project) {
        throw $this->createNotFoundException(
            'No project found for id '.$id
        );
        }

        return $this->render('project/detail.html.twig', [
            'project' => $project,
        ]);
    }

    // A finir
    //  #[Route('/project/add', name: 'newproj')]
    //  public function createProj(): Response
    //  {
    //      // you can fetch the EntityManager via $this->getDoctrine()
    //      // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
    //      $entityManager = $this->getDoctrine()->getManager();
    //      $date = new DateTime('now');
    //      $project = new Projects();
    //      $project->setName('Le premier projet');
    //      $project->setDescription('Comme dans toutes les entreprise toujours le plus important.');
    //      $project->setLogo('https://via.placeholder.com/150');
    //      $project->setStart($date);
         
 
        
    //      // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //      $entityManager->persist($project);
 
    //      // actually executes the queries (i.e. the INSERT query)
    //      $entityManager->flush();
 
    //      return new Response('Saved new user with id '.$user->getId());
    //  }
}
