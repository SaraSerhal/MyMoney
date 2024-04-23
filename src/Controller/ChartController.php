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
            }}


        $dailyBudget = $profileBudget / 7;
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
            $profile->setProfileBudget($newProfileBudget*7);
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

        return $this->render('home/chart.html.twig', [
            'controller_name' => 'ChartController',
            'chartData' => json_encode($chartData),
            'form' => $form->createView(),
        ]);
    }
}
