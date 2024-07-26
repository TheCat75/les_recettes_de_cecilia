<?php

namespace App\Controller\Public;

use App\Entity\NutritionalValues;
use App\Form\NutritionalValuesType;
use App\Repository\NutritionalValuesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nutritional/values')]
class NutritionalValuesController extends AbstractController
{
    #[Route('/', name: 'app_nutritional_values_index', methods: ['GET'])]
    public function index(NutritionalValuesRepository $nutritionalValuesRepository): Response
    {
        return $this->render('nutritional_values/index.html.twig', [
            'nutritional_values' => $nutritionalValuesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nutritional_values_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nutritionalValue = new NutritionalValues();
        $form = $this->createForm(NutritionalValuesType::class, $nutritionalValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nutritionalValue);
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_values_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nutritional_values/new.html.twig', [
            'nutritional_value' => $nutritionalValue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_values_show', methods: ['GET'])]
    public function show(NutritionalValues $nutritionalValue): Response
    {
        return $this->render('nutritional_values/show.html.twig', [
            'nutritional_value' => $nutritionalValue,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutritional_values_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NutritionalValues $nutritionalValue, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NutritionalValuesType::class, $nutritionalValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_values_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nutritional_values/edit.html.twig', [
            'nutritional_value' => $nutritionalValue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_values_delete', methods: ['POST'])]
    public function delete(Request $request, NutritionalValues $nutritionalValue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nutritionalValue->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($nutritionalValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nutritional_values_index', [], Response::HTTP_SEE_OTHER);
    }
}
