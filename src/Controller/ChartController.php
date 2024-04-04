<?php

namespace App\Controller;

use App\Repository\ExpensesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    #[Route('/chart', name: 'budget_chart')]
    public function chart(ExpensesRepository $expensesRepository): Response
    {
        $user = $this->getUser();

        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {

            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }


        $profile = $user->getProfiles()->first();
        $profileBudget = $profile->getProfileBudget();
        $dailyBudget = $profileBudget / 7;
        $categories = $profile->getExpensesCategories();
        $numberOfCategories = count($categories);

        $chartData = [];
        for ($day = 1; $day <= 7; ++$day) {
            $dayName = date('l', strtotime("Sunday +{$day} days"));
            $chartEntry = ['name' => $dayName];

            // Initialisez les valeurs de chaque catégorie pour chaque jour
            foreach ($categories as $category) {
                foreach ($category->getCategoryNames() as $categoryName) {
                    // Utilisez le nom de la catégorie comme clé et divisez le budget
                    $chartEntry[$categoryName->getName()] = $dailyBudget / $numberOfCategories;
                }
            }

            $chartData[] = $chartEntry;
        }




        return $this->render('home/chart.html.twig', [
            'controller_name' => 'ChartController',
            'chartData' => json_encode($chartData),
        ]);
    }
}
