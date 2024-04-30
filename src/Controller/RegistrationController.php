<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Services\RegistrationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $userPasswordHasher;
    private RegistrationService $registrationService;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, RegistrationService $registrationService)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
        $this->registrationService = $registrationService;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request,ValidatorInterface $validator): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $errors = $this->registrationService->validateForm($form, $validator);
            $unactiveUser= $this->userRepository->findUnactiveUserByEmailValid($user->getEmailValid());
            if ($unactiveUser){
                $this->registrationService->updateInactiveUser($unactiveUser, $form->get('lastName')->getData(), $form->get('name')->getData(), $form->get('age')->getData(), $form->get('plainPassword')->getData(), $form->get('email')->getData(), $this->userPasswordHasher, $this->entityManager);
                return $this->redirectToRoute('app_login');
            }
            if ($this->userRepository->findByEmailValid($form->get('email')->getData())) {
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                    'error' => 'Email already exists'
                ]);
            }
            $this->registrationService->createUser($form->get('email')->getData(), $form->get('lastName')->getData(), $form->get('name')->getData(), $form->get('age')->getData(), $form->get('plainPassword')->getData(), $this->userPasswordHasher, $this->entityManager);
            return $this->redirectToRoute('app_login');
        }
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


}