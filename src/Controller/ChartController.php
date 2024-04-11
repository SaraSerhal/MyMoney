<?php

namespace App\Controller;

use App\Repository\ExpensesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    #[Route('/chart', name: 'budget_chart')]
    public function chart(ExpensesRepository $expensesRepository): Response
    { $user = $this->getUser();

        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {

            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {


                $profileBudget = $profile->getProfileBudget();
            }}

        $dailyBudget = $profileBudget / 7;
        $categories = $profile->getExpensesCategories();
        $numberOfCategories = count($categories);

        $chartData = [];
        for ($day = 1; $day <= 7; ++$day) {
            $dayName = date('l', strtotime("Sunday +{$day} days"));
            $chartEntry = ['name' => $dayName];

            foreach ($categories as $category) {
                foreach ($category->getCategoryNames() as $categoryName) {
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
