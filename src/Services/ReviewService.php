<?php
namespace App\Services;
use App\Entity\User;
use App\Repository\ProfileRepository;

class ReviewService
{

    public function getReviewData(User $user): array
    {
        $profiles = $user->getProfiles();
        if (!$profiles || $profiles->isEmpty()) {
            throw new \LogicException('Profil ou budget non trouvé pour l\'utilisateur.');
        }

        $data = [];
        foreach ($profiles as $profile) {
            $initialBudget = $profile->getProfileBudget();
            $updatedBudget = $profile->getUpdatedProfileBudget();

            $data[] = [
                'name' => 'Profile Name : ' . $profile->getProfileType(),
                'initialBudget' => $initialBudget,
                'updatedBudget' => $updatedBudget
            ];
        }

        return $data;
    }
}
