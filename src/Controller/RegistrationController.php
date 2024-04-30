<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Services\RegistrationHandlerService;
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

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
    }


    #[Route('/register', name: 'app_register')]
    public function register(Request $request,ValidatorInterface $validator): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $errors = $validator->validate($user);

            if (count($errors) > 0) {
                // Traitement des erreurs de validation
                $errorsString = (string) $errors;
                return new Response($errorsString, 400);
            }

            $unactiveUser= $this->userRepository->findUnactiveUserByEmailValid($user->getEmailValid());
            if ($unactiveUser){
                $unactiveUser->setDeletedAt(null);
                $unactiveUser->setLastName($user->getLastName());
                $unactiveUser->setName($user->getName());
                $unactiveUser->setAge($user->getAge());
                $unactiveUser->setPassword($this->userPasswordHasher->hashPassword($unactiveUser, $form->get('plainPassword')->getData()));
                $unactiveUser->setEmailValid($user->getEmailValid());
                $this->entityManager->flush();
            return $this->redirectToRoute('app_login');
            }
            if ($this->userRepository->findByEmailValid($form->get('email')->getData())) {
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                    'error' => 'Email already exists'
                ]);
            }

            $user->setEmailValid($form->get('email')->getData());
            $user->setEmail($form->get('email')->getData());
            $user->setLastName($form->get('lastName')->getData());
            $user->setName($form->get('name')->getData());
            $user->setAge($form->get('age')->getData());
            $user->setPassword($this->userPasswordHasher->hashPassword($user, $form->get('plainPassword')->getData()));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_login');

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


}
