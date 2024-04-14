<?php

namespace App\Services;

use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;
class UserHandlerService extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private TokenStorageInterface $tokenStorage;

    public function __construct(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public function handleUseraccount(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
            // Récupérer tous les profils associés à l'utilisateur
            $profiles = $user->getProfiles();
            return $this->render('user/useraccount.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user,
                'profiles' => $profiles,
            ]);
        }
        return $this->redirectToRoute('home');
    }

    public function HandledeleteUserAndProfiles(Request $request): Response
    {
        $user = $this->tokenStorage->getToken()->getUser();

        if ($user) {
            $orphanExpensesCategories = $this->entityManager->getRepository(ExpensesCategory::class)->findBy(['profile' => null]);
            foreach ($orphanExpensesCategories as $orphan) {
                $this->entityManager->remove($orphan);
            }

            foreach ($user->getProfiles() as $profile) {
                foreach ($profile->getExpensesCategories() as $expensesCategory) {
                    $this->entityManager->remove($expensesCategory);
                }
                $this->entityManager->remove($profile);
            }

            $this->entityManager->remove($user);
            $this->entityManager->flush();

            $request->getSession()->invalidate();
            $this->tokenStorage->setToken(null);

            return $this->redirectToRoute('home');
        }

        return $this->redirectToRoute('home');
    }


}