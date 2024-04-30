<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Profile;
use App\Entity\ExpensesCategory;
use App\Entity\Expenses;
use App\Entity\CategoryName;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création de profils
        $profile = new Profile();
        $profile->setProfileType('Standard User');
        $profile->setProfileBudget(1500.00);
        $manager->persist($profile);

        // Création d'un utilisateur admin
        $user1 = new User();
        $user1->setEmail('odelia@example.com');
        $user1->setPassword('user1password'); // Ici, le mot de passe doit normalement être haché
        $user1->setRoles(['ROLE_ADMIN']);//Pour la mise en place d'un back-office pour l'administration ( si le temps le permet )
        $user1->setName('Odelia');
        $user1->setLastName('Cohen');
        $user1->setAge(21);
        $user1->addProfile($profile); // Associer le profil à l'utilisateur
        $manager->persist($user1);

        // Création d'un utilisateur standard
        $user2 = new User();
        $user2->setEmail('monsieur@example.com');
        $user2->setPassword('user2password'); // Idem pour le hachage
        $user2->setRoles(['ROLE_USER']);
        $user2->setName('Monsieur');
        $user2->setLastName('Yassin');
        $user2->setAge(25);
        $user2->addProfile($profile);
        $manager->persist($user2);

        // Création de catégories de dépenses et association à un profil
        $expenseCategory = new ExpensesCategory();
        $expenseCategory->setProfile($profile);
        $manager->persist($expenseCategory);

        // Création des noms de catégories de dépenses
        $categoryName1 = new CategoryName();
        $categoryName1->setName('Transport');
        $categoryName1->setExpensesCategory($expenseCategory);
        $manager->persist($categoryName1);

        $categoryName2 = new CategoryName();
        $categoryName2->setName('Food');
        $categoryName2->setExpensesCategory($expenseCategory);
        $manager->persist($categoryName2);

        // Création d'objets de dépenses
        $expense1 = new Expenses();
        $expense1->setCategoryExpenses($expenseCategory);
        $expense1->setAmountToSpend(200.00);
        $expense1->setAmountSpent(150.00);
        $expense1->setSpendDay(new \DateTime('today'));
        $expense1->setDailyCategoryBudget(100.00);
        $expense1->setDailyBudget(300.00);
        $manager->persist($expense1);

        $expense2 = new Expenses();
        $expense2->setCategoryExpenses($expenseCategory);
        $expense2->setAmountToSpend(300.00);
        $expense2->setAmountSpent(225.00);
        $expense2->setSpendDay(new \DateTime('yesterday'));
        $expense2->setDailyCategoryBudget(150.00);
        $expense2->setDailyBudget(500.00);
        $manager->persist($expense2);

        // Enregistrement de toutes les modifications
        $manager->flush();
    }
}
