<?php


namespace App\Controller;

use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;
use App\Services\UserHandlerService;

class UserController extends AbstractController
{
    private UserHandlerService $userHandlerService;

    public function __construct(UserHandlerService $userHandlerService)
    {
        $this->userHandlerService = $userHandlerService;
    }
    #[Route('/useraccount', name: 'budget_useraccount')]
    public function useraccount(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->userHandlerService->handleUseraccount($request, $entityManager);

    }
    #[Route('/useraccount/deleteUser', name: 'budget_delete_user')]
    public function deleteUserAndProfiles(Request $request, TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager): Response {
        return $this->userHandlerService->HandledeleteUserAndProfiles($request, $tokenStorage, $entityManager);
    }

}