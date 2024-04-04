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
    public function gererDepenses(): bool
    {

        return $this->amountSpent <= $this->amountToSpend;
    }


    public function calculerDepenseJour(): float
    {

        $profileBudget = $this->getCategoryExpenses()->getProfile()->getProfileBudget();
        $dailyBudget = $profileBudget / 7;
        $dailyCategoryBudget = $dailyBudget / 5;

        return $dailyCategoryBudget;

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
}
