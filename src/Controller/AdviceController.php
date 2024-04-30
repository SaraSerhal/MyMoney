<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\AdviceService;


class AdviceController extends AbstractController
{
    private $adviceService;

    public function __construct(AdviceService $adviceService)
    {
        $this->adviceService = $adviceService;
    }

    #[Route('/advice', name: 'advice')]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $profiles = $user->getProfiles();
        $adviceLinks = [];

        foreach ($profiles as $profile) {
            $profileType = $profile->getProfileType();
            $adviceLinks[$profileType] = $this->adviceService->getAdviceByProfileType($profileType);
        }

        return $this->render('advice/index.html.twig', [
            'adviceLinks' => $adviceLinks,
        ]);
    }
}
