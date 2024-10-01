<?php

namespace App\DTO;

use App\Entity\Customer;

class CustomerDTO
{
    public function __construct(
        private string $name,
        private string $surname,
        private int $age,
        private bool $registered,
        private ?DateTimeInterface $registeredAt = null,
        private ?string $password = null
    ){}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function IsRegistered(): ?bool
    {
        return $this->registered;
    }

    public function setRegistered(bool $registered): void
    {
        $this->registered = $registered;
    }

    public function getRegisteredAt(): ?DateTimeInterface
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(?DateTimeInterface $registeredAt): void
    {
        $this->registeredAt = $registeredAt;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }


    public function toEntity(): Customer
    {
        return new Customer();
    }
}