<?php

namespace App\Controller;

use App\Entity\Preparation;
use App\Form\PreparationType;
use App\Repository\PreparationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/preparation')]
class PreparationController extends AbstractController
{
    #[Route('/', name: 'app_preparation_index', methods: ['GET'])]
    public function index(PreparationRepository $preparationRepository): Response
    {
        return $this->render('preparation/index.html.twig', [
            'preparations' => $preparationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_preparation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $preparation = new Preparation();
        $form = $this->createForm(PreparationType::class, $preparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($preparation);
            $entityManager->flush();

            return $this->redirectToRoute('app_preparation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('preparation/new.html.twig', [
            'preparation' => $preparation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_preparation_show', methods: ['GET'])]
    public function show(Preparation $preparation): Response
    {
        return $this->render('preparation/show.html.twig', [
            'preparation' => $preparation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_preparation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Preparation $preparation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PreparationType::class, $preparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_preparation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('preparation/edit.html.twig', [
            'preparation' => $preparation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_preparation_delete', methods: ['POST'])]
    public function delete(Request $request, Preparation $preparation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$preparation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($preparation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_preparation_index', [], Response::HTTP_SEE_OTHER);
    }
}
