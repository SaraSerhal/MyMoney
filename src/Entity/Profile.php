<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $profileType = null;

    #[ORM\Column]
    private ?float $profileBudget = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'profiles')]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: ExpensesCategory::class, cascade: ['persist', 'remove'])]
    private Collection $expensesCategory;

    public function __construct()
    {
        // Initialisez la date de création dans le constructeur
        $this->createdAt = new \DateTimeImmutable();
        $this->users = new ArrayCollection();
        $this->expensesCategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfileType(): ?string
    {
        return $this->profileType;
    }

    public function setProfileType(string $profileType): static
    {
        $this->profileType = $profileType;

        return $this;
    }

    public function getProfileBudget(): ?float
    {
        return $this->profileBudget;
    }

    public function setProfileBudget(float $profileBudget): static
    {
        $this->profileBudget = $profileBudget;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addProfile($this);
        }

        return $this;
    }


    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeProfile($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ExpensesCategory>
     */
    public function getExpensesCategory(): Collection
    {
        return $this->expensesCategory;
    }

    public function addExpensesCategory(ExpensesCategory $expensesCategory): static
    {
        if (!$this->expensesCategory->contains($expensesCategory)) {
            $this->expensesCategory->add($expensesCategory);
            $expensesCategory->setProfile($this);
        }

        return $this;
    }

    public function removeExpensesCategory(ExpensesCategory $expensesCategory): static
    {
        if ($this->expensesCategory->removeElement($expensesCategory)) {
            // set the owning side to null (unless already changed)
            if ($expensesCategory->getProfile() === $this) {
                $expensesCategory->setProfile(null);
            }
        }

        return $this;
    }
}
