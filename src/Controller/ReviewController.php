<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
    #[Route('/review', name: 'review')]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('Aucun utilisateur connecté.');
        }

        $profiles = $user->getProfiles();
        if (!$profiles || $profiles->isEmpty()) {
            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }


        $data = [];
        foreach ($profiles as $profile) {
            $initialBudget = $profile->getProfileBudget();
            $updatedBudget = $profile->getUpdatedProfileBudget();

            $data[] = [
                'name' => 'Profile Name : ' . $profile->getProfileType(),
                'initialBudget' => $initialBudget,
                'updatedBudget' => $updatedBudget
            ];
            $data[] = [
                'name' => 'Profile Name : ' . $profile->getProfileType(),
                'initialBudget' => $initialBudget,
                'updatedBudget' => $updatedBudget
            ];
        }
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
            'chartData' => json_encode($data),
        ]);
    }


}