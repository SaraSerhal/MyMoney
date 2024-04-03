<?php

namespace App\Entity;

use App\Repository\ExpensesCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ExpensesCategoryRepository::class)]
#[Broadcast]
class ExpensesCategory{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;


    #[ORM\OneToMany(targetEntity: CategoryName::class, mappedBy: "expensesCategory", cascade: ["persist", "remove"])]
    private Collection $categoryNames;


    #[ORM\ManyToOne(inversedBy: "expensesCategories")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Profile $profile = null;

    #[ORM\OneToMany(mappedBy: 'categoryExpenses', targetEntity: Expenses::class)]
    private Collection $expenses;

    public function __construct()
    {
        $this->categoryNames = new ArrayCollection();
        $this->expenses = new ArrayCollection();
    }

    public function getCategoryNames(): Collection
    {
        return $this->categoryNames;
    }

    public function addCategoryName(CategoryName $categoryName): self
    {
        if (!$this->categoryNames->contains($categoryName)) {
            $this->categoryNames[] = $categoryName;
            $categoryName->setExpensesCategory($this);
        }

        return $this;
    }

    public function removeCategoryName(CategoryName $categoryName): self
    {
        if ($this->categoryNames->removeElement($categoryName)) {
            // set the owning side to null (unless already changed)
            if ($categoryName->getExpensesCategory() === $this) {
                $categoryName->setExpensesCategory(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return Collection<int, Expenses>
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expenses $expense): static
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses->add($expense);
            $expense->setCategoryExpenses($this);
        }

        return $this;
    }

    public function removeExpense(Expenses $expense): static
    {
        if ($this->expenses->removeElement($expense)) {
            // set the owning side to null (unless already changed)
            if ($expense->getCategoryExpenses() === $this) {
                $expense->setCategoryExpenses(null);
            }
        }

        return $this;
    }
}
