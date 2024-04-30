<?php
namespace App\Services;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class RegistrationService
{
    public function updateInactiveUser(User $user, $lastName, $name, $age, $plainPassword, $emailValid, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): void
    {
        // Mise à jour des données de l'utilisateur inactif
        $user->setDeletedAt(null);
        $user->setLastName($lastName);
        $user->setName($name);
        $user->setAge($age);
        $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
        $user->setEmailValid($emailValid);
        $entityManager->flush();
    }

    public function createUser($email, $lastName, $name, $age, $plainPassword, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager ): void
    {
        $user = new User();
        $user->setEmailValid($email);
        $user->setEmail($email);
        $user->setLastName($lastName);
        $user->setName($name);
        $user->setAge($age);
        $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
        $entityManager->persist($user);
        $entityManager->flush();
    }

    public function validateForm($form, ValidatorInterface $validator)
    {
        $user = $form->getData();
        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString, 400);
        }

    }

}
