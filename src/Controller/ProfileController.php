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
            $profileId = $profile->getId();

            switch ($profileType) {
                case 'Student':
                    return $this->redirectToRoute('budget_student', ['id' => $profileId]);
                case 'Traveler':
                    return $this->redirectToRoute('budget_traveler', ['id' => $profileId]);
                case 'Investor':
                    return $this->redirectToRoute('budget_investor', ['id' => $profileId]);
                case 'Parent':
                    return $this->redirectToRoute('budget_parent', ['id' => $profileId]);
                case 'Couple':
                    return $this->redirectToRoute('budget_couple', ['id' => $profileId]);
                default:
                    break;
            }



        }
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
            'form' => $form->createView(),

        ]);
    }

    #[Route('/profile/student/{id}', name: 'budget_student')]
    public function student(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $profile = $entityManager->getRepository(Profile::class)->find($id);

        if ($profile && $profile->getProfileType() === 'Student') {
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

        $this->addFlash('error', 'Aucun profil étudiant trouvé ou profil non étudiant.');
        return $this->redirectToRoute('some_other_route');
    }

    #[Route('/profile/traveler/{id}', name: 'budget_traveler')]
    public function traveler(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {

        $profile = $entityManager->getRepository(Profile::class)->find($id);

        if ($profile && $profile->getProfileType() === 'Traveler') {
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

        $this->addFlash('error', 'No traveler profile found or profile not of type Traveler.');
        return $this->redirectToRoute('some_other_route');
    }

    #[Route('/profile/investor/{id}', name: 'budget_investor')]
    public function investor(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $profile = $entityManager->getRepository(Profile::class)->find($id);

        if ($profile && $profile->getProfileType() === 'Investor') {
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

        $this->addFlash('error', 'Aucun profil investisseur trouvé ou profil non investisseur.');
        return $this->redirectToRoute('some_other_route');
    }

    #[Route('/profile/parent/{id}', name: 'budget_parent')]
    public function parent(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $profile = $entityManager->getRepository(Profile::class)->find($id);

        if ($profile && $profile->getProfileType() === 'Parent') {
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

        $this->addFlash('error', 'Aucun profil parent trouvé ou profil non parent.');
        return $this->redirectToRoute('some_other_route');
    }

    #[Route('/profile/couple/{id}', name: 'budget_couple')]
    public function couple(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $profile = $entityManager->getRepository(Profile::class)->find($id);

        if ($profile && $profile->getProfileType() === 'Couple') {
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

        $this->addFlash('error', 'Aucun profil de couple trouvé ou profil non couple.');
        return $this->redirectToRoute('some_other_route');
    }







}
