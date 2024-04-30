<?php

namespace App\Services;

use Symfony\Component\Form\FormError;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class UpdatePasswordService
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $userPasswordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function updatePassword(FormInterface $form, UserInterface $user): bool
    {
        if ($form->get('plainPassword')->getData() === $form->get('oldPassword')->getData()) {
            $form->get('plainPassword')->addError(new FormError('Your new password cannot be the same as your current password.'));
            return false;
        }

        if (!$this->userPasswordEncoder->isPasswordValid($user, $form->get('oldPassword')->getData())) {
            $form->get('oldPassword')->addError(new FormError('The password you entered is incorrect.'));
            return false;
        }

        $user->setPassword($this->userPasswordEncoder->hashPassword($user, $form->get('plainPassword')->getData()));
        $this->entityManager->flush();
        return true;
    }
}
