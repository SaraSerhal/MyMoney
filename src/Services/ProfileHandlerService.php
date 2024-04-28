<?php
namespace App\Services;

use App\Entity\CategoryName;
use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\ExpensesCategoryType;
use App\Repository\ProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileHandlerService extends AbstractController
{
    /* private EntityManagerInterface $entityManager;
    private ProfileRepository $profileRepository;

    public function __construct(EntityManagerInterface $entityManager, ProfileRepository $profileRepository)
    {
        $this->entityManager = $entityManager;
        $this->profileRepository = $profileRepository;
    }

    public function createProfile(Request $request): Response
    {
        $user = new User();
        $profile = new Profile();
        $form = $this->createForm(AccueilFormType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $profile->addUser($user);
            $this->entityManager->persist($profile);
            $this->entityManager->flush();

            $profileType = $form->getData()->getProfileType();
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
            'form' => $form->createView(),
        ]);
    }

    public function createStudentProfile(int $id, Request $request, EntityManagerInterface $entityManager): Response
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
                'profile' => $profile,
                'profileBudget' => $profileBudget,
                'form' => $form->createView(),
            ]);
        }

        $this->addFlash('error', 'Aucun profil étudiant trouvé ou profil non étudiant.');
        return $this->redirectToRoute('some_other_route');
    }

    public function createTravelerProfile(int $id, Request $request, EntityManagerInterface $entityManager): Response
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
                'profile' => $profile,
                'profileBudget' => $profileBudget,
                'form' => $form->createView(),
            ]);
        }

        $this->addFlash('error', 'Aucun profil voyageur trouvé ou profil non voyageur.');
        return $this->redirectToRoute('some_other_route');
    }

public function createInvestorProfile(int $id, Request $request, EntityManagerInterface $entityManager): Response
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
                'profile' => $profile,
                'profileBudget' => $profileBudget,
                'form' => $form->createView(),
            ]);
        }

        $this->addFlash('error', 'Aucun profil investisseur trouvé ou profil non investisseur.');
        return $this->redirectToRoute('some_other_route');
    }

    public function createParentProfile(int $id, Request $request, EntityManagerInterface $entityManager): Response
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
                'profile' => $profile,
                'profileBudget' => $profileBudget,
                'form' => $form->createView(),
            ]);
        }

        $this->addFlash('error', 'Aucun profil parent trouvé ou profil non parent.');
        return $this->redirectToRoute('some_other_route');
    }

    public function createCoupleProfile(int $id, Request $request, EntityManagerInterface $entityManager): Response
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
                'profile' => $profile,
                'profileBudget' => $profileBudget,
                'form' => $form->createView(),
            ]);
        }

        $this->addFlash('error', 'Aucun profil couple trouvé ou profil non couple.');
        return $this->redirectToRoute('some_other_route');
    } */

}