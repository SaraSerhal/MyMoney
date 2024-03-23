<?php

namespace App\Controller;

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
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        if ($this->getUser()) { // Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
            return $this->redirectToRoute('new_profile');
        }
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


}