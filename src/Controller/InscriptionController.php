<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\returnArgument;

class InscriptionController extends AbstractController{



    #[Route('/accueil', name: 'budget_accueil')]
    public function accueil(): Response
    {
        return $this->render('inscription/accueil.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }








}
