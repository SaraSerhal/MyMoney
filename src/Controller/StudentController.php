<?php


namespace App\Controller;

use App\Entity\CategoryName;
use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\ExpensesCategoryType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class StudentController extends AbstractController
{
    #[Route('/profile/student', name: 'budget_student')]
    public function student(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                if ($profile->getProfileType() === 'Student') {
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

                    return $this->render('profile/student.html.twig', [
                        'controller_name' => 'StudentController',
                        'profile' => $profile,
                        'profileBudget' => $profileBudget,
                        'form' => $form->createView(),
                    ]);
                }
            }
            $this->addFlash('error', 'Aucun profil étudiant trouvé.');
            return $this->redirectToRoute('some_other_route');
        }

        return $this->render('profile/student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
}