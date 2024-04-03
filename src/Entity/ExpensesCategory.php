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

    public function __construct()
    {
        $this->categoryNames = new ArrayCollection();
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
}
