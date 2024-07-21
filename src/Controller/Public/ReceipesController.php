<?php

namespace App\Controller\Public;

use App\Entity\Receipes;
use App\Entity\Ingrediens;
use App\Entity\Allergens;
use App\Entity\NutritionalValues;
use App\Entity\Steps;
use App\Form\ReceipeFormType;
use App\Repository\ReceipesRepository;
use App\Form\ReceipesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Flex\Recipe;

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
    public function add(Request $request, EntityManagerInterface $entityManager, ?Receipes $receipes = null, ReceipesRepository $receipeRepository): Response
    {
        if (!$receipes) {
            $receipes = new Receipes();
    
            $allergen = new Allergens();
            $entityManager->persist($allergen);
            $receipes->addAllergen($allergen);
            
            $ingredien = new Ingrediens();
            $entityManager->persist($ingredien);
            $receipes->addIngredien($ingredien);
            
            $nutritionalValue = new NutritionalValues();
            $entityManager->persist($nutritionalValue);
            $receipes->addNutritionalValue($nutritionalValue);
            
            $step = new Steps();
            $entityManager->persist($step);
            $receipes->addStep($step);

            $entityManager->persist($receipes);
        }
        $form = $this->createForm(ReceipeFormType::class, $receipes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($receipes);
            $entityManager->flush();

            return $this->redirectToRoute('app_receipes');
        }
        
        return $this->render('pages/receipes/add.html.twig',
            [
                'form' => $form,
                'receipes' => $receipes,
            ]);
    }
}