<?php
namespace App\Services;

use App\Entity\Expenses;
use Doctrine\ORM\EntityManagerInterface;

class UpdateBudgetService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createExpensesFromFormData(array $formData): Expenses
    {
        $expenses = new Expenses();
        $expenses->setDailyBudget($formData['dailyBudget']);
        $expenses->setDailyCategoryBudget($formData['categoryDailyBudget']);

        $this->entityManager->persist($expenses);
        $this->entityManager->flush();

        return $expenses;
    }
}
