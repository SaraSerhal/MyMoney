<?php

namespace App\Controller;

use App\Services\ProfileHandlerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController{

/*#[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    } */

    private ProfileHandlerService $profileHandlerService;
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager, ProfileHandlerService $profileHandlerService)
    {
        $this->entityManager = $entityManager;
        $this->profileHandlerService = $profileHandlerService;
    }
    #[Route('/profile/new_profile', name: 'new_profile')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->profileHandlerService->createProfile($request, $entityManager);
    }

    #[Route('/profile/student/{id}', name: 'budget_student')]
    public function student(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->profileHandlerService->createStudentProfile($id, $request, $entityManager);
    }

    #[Route('/profile/traveler/{id}', name: 'budget_traveler')]
    public function traveler(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->profileHandlerService->createTravelerProfile($id, $request, $entityManager);
    }

    #[Route('/profile/investor/{id}', name: 'budget_investor')]
    public function investor(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->profileHandlerService->createInvestorProfile($id, $request, $entityManager);
    }

    #[Route('/profile/parent/{id}', name: 'budget_parent')]
    public function parent(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->profileHandlerService->createParentProfile($id, $request, $entityManager);
    }

    #[Route('/profile/couple/{id}', name: 'budget_couple')]
    public function couple(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->profileHandlerService->createCoupleProfile($id, $request, $entityManager);
    }

}
