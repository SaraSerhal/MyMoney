<?php

namespace App\Controller;

use App\Entity\Expenses;
use App\Repository\ExpensesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    #[Route('/chart', name: 'budget_chart')]
    public function chart(ExpensesRepository $expensesRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {
            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        $profiles = $user->getProfiles();
        $chartData = [];

        foreach ($profiles as $profile) {
            $profileBudget = $profile->getProfileBudget();
            $dailyBudget = $profileBudget / 7;
            $categories = $profile->getExpensesCategories();
            $numberOfCategories = count($categories);

            foreach ($categories as $category) {
                $dailyCategoryBudget = $dailyBudget /5;

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
        }

        $entityManager->flush();

        return $this->render('home/chart.html.twig', [
            'controller_name' => 'ChartController',
            'chartData' => json_encode($chartData),
        ]);
    }
}
