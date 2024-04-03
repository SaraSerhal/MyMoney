<?php

namespace App\Entity;

use App\Repository\CategoryNameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryNameRepository::class)]
class CategoryName
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;


    #[ORM\ManyToOne(inversedBy: 'categoryNames')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ExpensesCategory $expensesCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getExpensesCategory(): ?ExpensesCategory
    {
        return $this->expensesCategory;
    }

    public function setExpensesCategory(?ExpensesCategory $expensesCategory): static
    {
        $this->expensesCategory = $expensesCategory;

        return $this;
    }
    public function __toString()
    {
        // Retourne le nom de la catégorie s'il est défini, sinon une chaîne vide
        return $this->name ?? '';
    }


}
