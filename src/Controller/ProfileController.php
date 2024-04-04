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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class ProfileController extends AbstractController{

/*#[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    } */

    #[Route('/profile/new_profile', name: 'new_profile')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $profile = new Profile();
        $form = $this->createForm(AccueilFormType::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $profile->addUser($user);
            $entityManager->persist($profile);
            $entityManager->flush();
            $formData = $form->getData();



            $profileType = $formData->getProfileType();

            switch ($profileType) {
                case 'Student':
                    return $this->redirectToRoute('budget_student');
                case 'Traveler':
                    return $this->redirectToRoute('budget_traveler');
                case 'Investor':
                    return $this->redirectToRoute('budget_investor');
                case 'Parent':
                    return $this->redirectToRoute('budget_parent');
                case 'Couple':
                    return $this->redirectToRoute('budget_couple');
                default:
                    return $this->redirectToRoute('budget_accueil');
            }




        }
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
            'form' => $form->createView(),

        ]);
    }

    #[Route('/profile/student', name: 'budget_student')]
    public function student(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Student') {
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

                    return $this->render('profile/student.html.twig', [
                        'controller_name' => 'ProfileController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/student.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

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
                        'controller_name' => 'ProfileController',
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
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/profile/investor', name: 'budget_investor')]
    public function investor(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Investor') {
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

                    return $this->render('profile/investor.html.twig', [
                        'controller_name' => 'ProfileController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/investor.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/profile/parent', name: 'budget_parent')]
    public function parent(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Parent') {
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

                    return $this->render('profile/parent.html.twig', [
                        'controller_name' => 'ProfileController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/parent.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/profile/couple', name: 'budget_couple')]
    public function couple(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Couple') {
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

                    return $this->render('profile/couple.html.twig', [
                        'controller_name' => 'ProfileController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/couple.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }







}
