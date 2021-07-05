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
}
