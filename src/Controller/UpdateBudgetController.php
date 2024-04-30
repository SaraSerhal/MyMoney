<?php

namespace App\Controller;

use App\Entity\Expenses;
use App\Form\ExpensesType;
use App\Services\UpdateBudgetService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateBudgetController extends AbstractController
{
    private UpdateBudgetService $budgetUpdateService;
    public function __construct(UpdateBudgetService $budgetUpdateService)
    {
        $this->budgetUpdateService = $budgetUpdateService;
    }

    #[Route('/update-budget', name: 'update_budget')]
    public function updateBudget(Request $request): Response
    {
        // Créer le formulaire
        $form = $this->createForm(ExpensesType::class);
        $form->handleRequest($request);
        // Vérifier si le formulaire a été soumis et si les données sont valides
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $request->request->get('expenses_form');
            $this->budgetUpdateService->createExpensesFromFormData($formData);
            // Afficher un message de réussite
            $this->addFlash('success', 'Le budget a été mis à jour avec succès.');
            return $this->redirectToRoute('home');
        }

        // Rendre la vue avec le formulaire
        return $this->render('update_budget/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
