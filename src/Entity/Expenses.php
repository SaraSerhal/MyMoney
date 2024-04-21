<?php

namespace App\Entity;

use App\Repository\ExpensesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpensesRepository::class)]
class Expenses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amountToSpend = null;

    #[ORM\Column]
    private ?float $amountSpent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $spendDay = null;
    #[ORM\Column(type: Types::FLOAT)]
    private ?float $dailyCategoryBudget = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $dailyBudget = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?ExpensesCategory $categoryExpenses = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountToSpend(): ?float
    {
        return $this->amountToSpend;
    }

    public function setAmountToSpend(float $amountToSpend): static
    {
        $this->amountToSpend = $amountToSpend;

        return $this;
    }

    public function getAmountSpent(): ?float
    {
        return $this->amountSpent;
    }

    public function setAmountSpent(float $amountSpent): static
    {
        $this->amountSpent = $amountSpent;

        return $this;
    }

    public function getSpendDay(): ?\DateTimeInterface
    {
        return $this->spendDay;
    }

    public function setSpendDay(\DateTimeInterface $spendDay): static
    {
        $this->spendDay = $spendDay;

        return $this;
    }



    public function getCategoryExpenses(): ?ExpensesCategory
    {
        return $this->categoryExpenses;
    }

    public function setCategoryExpenses(?ExpensesCategory $categoryExpenses): static
    {
        $this->categoryExpenses = $categoryExpenses;

        return $this;
    }
    public function getDailyCategoryBudget(): ?float
    {
        return $this->dailyCategoryBudget;
    }

    public function setDailyCategoryBudget(float $dailyCategoryBudget): static
    {
        $this->dailyCategoryBudget = $dailyCategoryBudget;

        return $this;
    }

    public function getDailyBudget(): ?float
    {
        return $this->dailyBudget;
    }

    public function setDailyBudget(float $dailyBudget): static
    {
        $this->dailyBudget = $dailyBudget;

        return $this;
    }
}
