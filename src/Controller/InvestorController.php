<?php


namespace App\Controller;

use App\Entity\CategoryName;
use App\Entity\ExpensesCategory;
use App\Form\ExpensesCategoryType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvestorController extends AbstractController
{
    #[Route('/profile/investor', name: 'budget_investor')]
    public function investor(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Investor') {
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
                        'controller_name' => 'InvestorController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/investor.html.twig', [
            'controller_name' => 'InvestorController',
        ]);
    }
}