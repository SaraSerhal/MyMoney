<?php

namespace App\Controller;

use App\Entity\CategoryName;
use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\ExpensesCategoryType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TravelerController extends AbstractController
{
    #[Route('/profile/traveler', name: 'budget_traveler')]
    public function traveler(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Traveler') {
                    $profileBudget = $profile->getProfileBudget();
                    $expensesCategory = new ExpensesCategory();
                    $expensesCategory->setProfile($profile);

                    for ($i = 0; $i < 5; $i++) {
                        $categoryName = new CategoryName();
                        $expensesCategory->addCategoryName($categoryName);
                        $entityManager->persist($categoryName);
                    }

                    $form = $this->createForm(ExpensesCategoryType::class, $expensesCategory);

                    $form->handleRequest($request);
                    if ($form->isSubmitted() && $form->isValid()) {
                        $entityManager->persist($expensesCategory);
                        $entityManager->flush();
                        return $this->redirectToRoute('budget_chart');
                    }

                    return $this->render('profile/traveler.html.twig', [
                        'controller_name' => 'TravelerController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/traveler.html.twig', [
            'controller_name' => 'TravelerController',
        ]);
    }
}