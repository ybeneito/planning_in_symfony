<?php
// src/Controller/Bonjour.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Bonjour extends AbstractController
{
    /**
     * @Route("/bonjour/{name?Yohan}/{age?34}")
     */
    // permet de saluer l'utilisateur en fonction des paramètres passés dans l'URL grâce à l'objet Request 
    // si il n'y a pas les infos des valeurs pas défauts sont déjà indiqués
    public function saluer(Request $request, $name, $age): Response
    {
        return $this->render('bonjour.html.twig', [
            'name' => $name,
            'age' => $age
        ]);
    }
}
