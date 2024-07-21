<?php

namespace App\Controller\Public;

use App\Entity\Receipes;
use App\Repository\ReceipesRepository;
use App\Form\ReceipesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
#[Route('/receipes')]
class ReceipesController extends AbstractController
{
    #[Route('/', name: 'app_receipes')]
    
    public function index(ReceipesRepository $receipeRepository): Response
    {
        return $this->render('pages/receipes/index.html.twig', [
            'receipes' => $receipeRepository->findAll(),
        ]);
    }
    
    #[Route('/add', name: 'app_receipes_add')]
    public function add(Request $request,EntityManagerInterface $entityManager): Response
    {
        // $receipes = new Receipes();
        // $form = $this->createForm(ReceipesType::class, $receipes);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $entityManager->flush();

        //     return $this->redirectToRoute('app_receipes', [], Response::HTTP_SEE_OTHER);
        // }
        return $this->render('pages/receipes/add.html.twig', [
            // 'form' => $form,
            
        ]
        );
    }
}