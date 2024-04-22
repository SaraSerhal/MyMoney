<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateBudgetController extends AbstractController
{
    #[Route('/update/budget', name: 'app_update_budget')]
    public function index(): Response
    {
        return $this->render('update_budget/index.html.twig', [
            'controller_name' => 'UpdateBudgetController',
        ]);
    }
}
