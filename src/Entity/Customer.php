<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    public function __construct(
        #[ORM\Column(length: 100)]
        private string $name,
        #[ORM\Column(length: 100)]
        private string $surname,
        #[ORM\Column]
        private int $age,
        #[ORM\Column]
        private ?bool $isRegistered,
        #[ORM\Column(type: 'datetime')]
        private ?DateTimeInterface $registeredAt = null,
        #[ORM\Column(length: 255)]
        private ?string $password = null
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function isRegistered(): bool
    {
        return $this->isRegistered;
    }

    public function setRegistered(bool $isRegistered): self
    {
        $this->isRegistered = $isRegistered;

        return $this;
    }

    public function getRegisteredAt(): ?DateTimeInterface
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(?DateTimeInterface $registeredAt): static
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
