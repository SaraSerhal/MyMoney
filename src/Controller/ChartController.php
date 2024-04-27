<?php

namespace App\Controller;

use App\Entity\Expenses;
use App\Form\ExpensesType;
use App\Repository\ExpensesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    #[Route('/chart', name: 'budget_chart')]
    public function chart(Request $request, ExpensesRepository $expensesRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {

            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {


                $profileBudget = $profile->getProfileBudget();
                $updatedProfileBudget = $profile->getUpdatedProfileBudget();
            }}

        $budgetToUse = $updatedProfileBudget ?? $profileBudget;
        $dailyBudget = $budgetToUse / 7;
        $categories = $profile->getExpensesCategories();

        foreach ($categories as $category) {
            $dailyCategoryBudget = $dailyBudget / 5;
            // Initialize and persist each category's budget
            $expense = new Expenses();
            $expense->setCategoryExpenses($category);
            $expense->setDailyBudget($dailyBudget);
            $expense->setDailyCategoryBudget($dailyCategoryBudget);
            $expense->setAmountToSpend($dailyCategoryBudget);
            $expense->setAmountSpent(0); // Setting amount spent to 0 or appropriate value

            // Set the spend day to today's date for demonstration purposes
            $expense->setSpendDay(new \DateTime('now'));
            $entityManager->persist($expense);
        }

        $entityManager->flush(); // Enregistrer les entités Expense persistées

        $chartData = [];

        for ($day = 1; $day <= 7; ++$day) {
            $dayName = date('l', strtotime("Sunday +{$day} days"));
            $chartEntry = ['name' => $dayName];

            foreach ($categories as $category) {
                foreach ($category->getCategoryNames() as $categoryName) {
                    $chartEntry[$categoryName->getName()] = $dailyBudget / 5;
                }
            }
            $chartData[] = $chartEntry;
        }

        $form = $this->createForm(ExpensesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            // Mettre à jour le profileBudget de l'utilisateur avec le nouveau budget quotidien
            $newProfileBudget = $formData['dailyBudget'] ;
            $profile->setUpdatedProfileBudget($newProfileBudget*7);
            $entityManager->persist($profile);
            $entityManager->flush();

            // Mettre à jour les dépenses dans la base de données avec les nouvelles valeurs
            foreach ($categories as $category) {
                $expense = $expensesRepository->findOneBy(['categoryExpenses' => $category]);

                $expense->setDailyBudget($formData['dailyBudget']);
                $expense->setDailyCategoryBudget($formData['categoryDailyBudget']);
                $entityManager->persist($profile);
                $entityManager->flush();
            }

            return $this->redirectToRoute('budget_chart');
        }

        return $this->render('chart/index.html.twig', [
            'controller_name' => 'ChartController',
            'chartData' => json_encode($chartData),
            'form' => $form->createView(),
            'profileBudget' => $profileBudget,
        ]);
    }

    #[Route('/expenses/showCategories', name: 'budget_show_categories')]
    public function readExpensesCategories(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {
            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        $profiles = $user->getProfiles();
        $categoriesDetails = [];

        foreach ($profiles as $profile) {
            $expensesCategories = $profile->getExpensesCategories();
            if (!$expensesCategories->isEmpty()) {
                foreach ($expensesCategories as $category) {
                    $categoryNames = $category->getCategoryNames();
                    $categoriesDetails[] = [
                        'profileName' => $profile->getProfileType(),
                        'category' => $category,
                        'names' => $categoryNames
                    ];
                }
            }
        }

        if (empty($categoriesDetails)) {
            throw $this->createNotFoundException('Aucune catégorie de dépenses trouvée pour ce profil.');
        }

        return $this->render('expenses/myexpensescategories.html.twig', [
            'controller_name' => 'ExpensesController',
            'user' => $user,
            'categoriesDetails' => $categoriesDetails
        ]);
    }

    #[Route('/expenses/showExpenses', name: 'budget_show_expenses')]
    public function readExpenses(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('User not found.');
        }

        $profiles = $user->getProfiles();
        if (!$profiles || $profiles->isEmpty()) {
            throw $this->createNotFoundException('No profiles found for the user.');
        }

        $profilesWithExpenses = [];
        foreach ($profiles as $profile) {
            $profileData = [
                'name' => $profile->getProfileType(),
                'expenses' => []
            ];
            foreach ($profile->getExpensesCategories() as $category) {
                foreach ($category->getExpenses() as $expense) {
                    if (null === $expense->getDeletedAt()) {  // Check if the expense is not soft-deleted
                        $profileData['expenses'][] = $expense;
                    }
                }
            }
            $profilesWithExpenses[] = $profileData;
        }

        return $this->render('expenses/myexpenses.html.twig', [
            'controller_name' => 'ExpenseController',
            'profilesWithExpenses' => $profilesWithExpenses
        ]);
    }

    #[Route('/expenses/deleteAllCategories', name: 'budget_delete_all_categories')]
    public function deleteAllCategoriesAndExpenses(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('login');
        }
        $entityManager->getFilters()->enable('softdeleteable');

        $profiles = $user->getProfiles();
        if (!$profiles->isEmpty()) {
            foreach ($profiles as $profile) {
                $expensesCategories = $profile->getExpensesCategories();
                if (!$expensesCategories->isEmpty()) {
                    foreach ($expensesCategories as $category) {
                        $entityManager->remove($category);
                    }
                    foreach ($expensesCategories as $category) {
                        foreach ($category->getCategoryNames() as $categoryName) {
                            $entityManager->remove($categoryName);
                        }
                    }
                    foreach ($expensesCategories as $category) {
                        // Supprimer d'abord toutes les dépenses associées à chaque catégorie
                        foreach ($category->getExpenses() as $expense) {
                            $entityManager->remove($expense);

                        }
                    }
                }
            }
            $entityManager->flush();
            $this->addFlash('success', 'All expenses categories have been successfully deleted.');
        } else {
            $this->addFlash('error', 'No profiles found.');
        }

        return $this->redirectToRoute('new_profile');
    }
}
