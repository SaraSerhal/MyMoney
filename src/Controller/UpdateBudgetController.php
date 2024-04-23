<?php

namespace App\Controller;

use App\Entity\Expenses;
use App\Form\ExpensesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateBudgetController extends AbstractController
{
    #[Route('/update-budget', name: 'update_budget')]
    public function updateBudget(Request $request): Response
    {
        // Créer le formulaire
        $form = $this->createForm(ExpensesType::class);
        $form->handleRequest($request);

        // Vérifier si le formulaire a été soumis et si les données sont valides
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données soumises par l'utilisateur
            $newBudget = $form->get('dailyBudget')->getData();
            $newCategoryDailyBudget = $form->get('categoryDailyBudget')->getData();

            // Créer une nouvelle instance de l'entité Expenses
            $expenses = new Expenses();
            $expenses->setDailyBudget($newBudget);
            $expenses->setDailyCategoryBudget($newCategoryDailyBudget);

            // Récupérer l'EntityManager et persister l'entité
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($expenses);
            $entityManager->flush();

            // Rediriger l'utilisateur vers une autre page ou afficher un message de réussite
            $this->addFlash('success', 'Le budget a été mis à jour avec succès.');

            return $this->redirectToRoute('home'); // Redirection vers la page d'accueil par exemple
        }

        // Rendre la vue avec le formulaire
        return $this->render('update_budget/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
