<?php

namespace App\Entity;

use App\Repository\ExpensesCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ExpensesCategoryRepository::class)]
#[Broadcast]
class ExpensesCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @ORM\OneToMany(targetEntity=CategoryName::class, mappedBy="expensesCategory", cascade={"persist", "remove"})
     */
    private Collection $categoryNames;

    public function __construct()
    {
        $this->categoryNames = new ArrayCollection();
        $this->namesCategory = new ArrayCollection();
    }

    #[ORM\ManyToOne(inversedBy: 'expensesCategory')]
    private ?Profile $profile = null;

    #[ORM\OneToMany(mappedBy: 'expensesCategory', targetEntity: CategoryName::class)]
    private Collection $namesCategory;

    public function getCategoryNames(): Collection
    {
        return $this->categoryNames;
    }

    public function addCategoryName(CategoryName $categoryName): static
    {
        if (!$this->categoryNames->contains($categoryName)) {
            $this->categoryNames->add($categoryName);
            $categoryName->setExpensesCategory($this);
        }

        return $this;
    }

    public function removeCategoryName(CategoryName $categoryName): static
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

    public function setProfile(?Profile $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return Collection<int, CategoryName>
     */
    public function getNamesCategory(): Collection
    {
        return $this->namesCategory;
    }

    public function addNamesCategory(CategoryName $namesCategory): static
    {
        if (!$this->namesCategory->contains($namesCategory)) {
            $this->namesCategory->add($namesCategory);
            $namesCategory->setExpensesCategory($this);
        }

        return $this;
    }

    public function removeNamesCategory(CategoryName $namesCategory): static
    {
        if ($this->namesCategory->removeElement($namesCategory)) {
            // set the owning side to null (unless already changed)
            if ($namesCategory->getExpensesCategory() === $this) {
                $namesCategory->setExpensesCategory(null);
            }
        }

        return $this;
    }
}
