<?php

namespace App\Controller\Public;

use App\Entity\Allergens;
use App\Form\AllergensType;
use App\Repository\AllergensRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/allergens')]
class AllergensController extends AbstractController
{
    #[Route('/', name: 'app_allergens_index', methods: ['GET'])]
    public function index(AllergensRepository $allergensRepository): Response
    {
        return $this->render('allergens/index.html.twig', [
            'allergens' => $allergensRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_allergens_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $allergen = new Allergens();
        $form = $this->createForm(AllergensType::class, $allergen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($allergen);
            $entityManager->flush();

            return $this->redirectToRoute('app_allergens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('allergens/new.html.twig', [
            'allergen' => $allergen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_allergens_show', methods: ['GET'])]
    public function show(Allergens $allergen): Response
    {
        return $this->render('allergens/show.html.twig', [
            'allergen' => $allergen,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_allergens_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Allergens $allergen, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AllergensType::class, $allergen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_allergens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('allergens/edit.html.twig', [
            'allergen' => $allergen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_allergens_delete', methods: ['POST'])]
    public function delete(Request $request, Allergens $allergen, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$allergen->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($allergen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_allergens_index', [], Response::HTTP_SEE_OTHER);
    }
}