<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;
class CreateRentingAgentRequest
{
    public function __construct(
        #[Assert\NotBlank(message: "Email cannot be blank")]
        #[Assert\Email(message: "Invalid email format")]
        private string $email,
        #[Assert\NotBlank(message: "Name cannot be blank")]
        #[Assert\Length(
            min: 3,
            max: 25,
            minMessage: "Name must be at least {{ limit }} characters long",
            maxMessage: "Name cannot be longer than {{ limit }} characters"
        )]
        private string $name,
        #[Assert\NotBlank(message: "Surname cannot be blank")]
        #[Assert\Length(
            min: 3,
            max: 25,
            minMessage: "Surname must be at least {{ limit }} characters long",
            maxMessage: "Surname cannot be longer than {{ limit }} characters"
        )]
        private string $surname,
        #[Assert\NotBlank(message: "Phone number cannot be blank")]
        #[Assert\Length(
            min: 5,
            max: 15,
            minMessage: "Phone number must be at least {{ limit }} characters long",
            maxMessage: "Phone number cannot be longer than {{ limit }} characters"
        )]
        #[Assert\Regex(
            pattern: "/^\d+$/",
            message: "Phone number can only contain digits"
        )]
        private string $phoneNumber,
        #[Assert\Range(
            notInRangeMessage: "Points must be between {{ min }} and {{ max }}",
            min: 0,
            max: 250,
        )]
        #[Assert\Type(
            type: 'integer',
            message: 'Points must be a valid integer'
        )]
        private int $points = 100
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

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): void
    {
        $this->points = $points;
    }


}