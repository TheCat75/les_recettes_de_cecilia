<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;

#[Route('/profile')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_show', methods: ['GET', 'POST'])]
    public function show(Request $request, #[CurrentUser] User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_show', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/delete', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, #[CurrentUser] User $user, EntityManagerInterface $entityManager, Session $session): Response
    {
        $token = $request->headers->get('X-CSRF-Token');
        
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $token)) {
            
            $entityManager->remove($user);
            $entityManager->flush();
            $session = new Session();
            $session->invalidate();
            
            return new JsonResponse(['status' => 'deleted']);
        }
        
        return new JsonResponse(['status' => 'error'], Response::HTTP_FORBIDDEN);
    }     
}