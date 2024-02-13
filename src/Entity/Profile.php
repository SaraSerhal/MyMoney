<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;

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

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'profiles')]
    private Collection $users;

    public function __construct()
    {

        $this->createdAt = new \DateTimeImmutable();
        $this->users = new ArrayCollection();
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

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
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




}
