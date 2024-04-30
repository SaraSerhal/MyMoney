<?php

namespace App\Controller;

use App\Entity\CategoryName;
use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\ExpensesCategoryType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class ProfileController extends AbstractController{

    #[Route('/profile/new_profile', name: 'new_profile')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $profile = new Profile();
        $form = $this->createForm(AccueilFormType::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $profileType = $form->getData()->getProfileType();
            $existingProfile = $user->getProfiles()->filter(function ($profile) use ($profileType) {
                return $profile->getProfileType() === $profileType;
            })->first();

            if ($existingProfile) {
                // Update the budget of the existing profile
                $existingProfile->setProfileBudget($form->getData()->getProfileBudget());
                $entityManager->persist($existingProfile);
                $entityManager->flush();

                return $this->redirectToRoute('budget_chart');
            }

            $user->addProfile($profile);
            $entityManager->persist($profile);
            $entityManager->flush();

            $formData = $form->getData();
            $profileId = $formData->getId();

            switch ($profileType) {
                case 'Student':
                    return $this->redirectToRoute('budget_student');
                case 'Traveler':
                    return $this->redirectToRoute('budget_traveler');
                case 'Investor':
                    return $this->redirectToRoute('budget_investor');
                case 'Parent':
                    return $this->redirectToRoute('budget_parent');
                case 'Couple':
                    return $this->redirectToRoute('budget_couple');
                default:
                    return $this->redirectToRoute('budget_accueil');
            }
        }
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
            'form' => $form->createView(),

        ]);
    }













    #[Route('/profile/deleteAllProfiles', name: 'budget_delete_all_profiles')]
    public function deleteAllProfilesAndReview(EntityManagerInterface $entityManager): Response
    {

        $entityManager->getFilters()->enable('softdeleteable');

        $user = $this->getUser();
        if ($user && $profiles = $user->getProfiles()) {
            foreach ($profiles as $profile) {
                $entityManager->remove($profile);
            }
            $entityManager->flush();

            return $this->redirectToRoute('new_profile');
        }

        return $this->redirectToRoute('new_profile');
    }



    #[Route('/profile/showProfile', name: 'budget_show_profile')]
    public function readProfile(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user || !$user->getProfiles() || $user->getProfiles()->isEmpty()) {
            throw $this->createNotFoundException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        if ($user){
            $profiles = $user->getProfiles();
            return $this->render('Profile/myprofile.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user,
                'profiles' => $profiles,
            ]);
        }
        return $this->redirectToRoute('new_profile');

    }







}
