<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReceipesController extends AbstractController
{
    #[Route('/receipes', name: 'app_receipes')]
    public function index(): Response
    {
        return $this->render('receipes/index.html.twig', [
            'controller_name' => 'ReceipesController',
        ]);
    }
}
