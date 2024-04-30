<?php

namespace App\Controller;

use App\Form\UpdatePasswordType;
use App\Services\UpdatePasswordService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class SecurityController extends AbstractController
{
    private UpdatePasswordService $updatePasswordService;

    public function __construct(UpdatePasswordService $updatePasswordService)
    {
        $this->updatePasswordService = $updatePasswordService;
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) { // Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
             return $this->redirectToRoute('new_profile');
          }
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/update-password', name: 'update_password')]
    public function updatePassword(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UpdatePasswordType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->updatePasswordService->updatePassword($form, $user)){
                $this->addFlash('success', 'Your password has been updated.');
            }

        }
        return $this->render('security/updatePassword.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
