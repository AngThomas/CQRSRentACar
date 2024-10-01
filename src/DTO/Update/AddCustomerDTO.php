<?php

namespace App\DTO\Update;

use App\Entity\Customer;

class AddCustomerDTO
{
    public function __construct(
        private string $email,
        private string $name,
        private string $surname,
        private int $age,
    )
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
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

    public function toEntity(): Customer
    {
        return new Customer(
            email: $this->email,
            name: $this->name,
            surname: $this->surname,
            age: $this->age
        );
    }
}