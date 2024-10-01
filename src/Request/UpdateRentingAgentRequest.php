<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class UpdateRentingAgentRequest
{
    public function __construct(
        #[Assert\NotBlank(message: "Id cannot be blank")]
        #[Assert\Type(type: 'integer', message: "Id must be an integer")]
        public int $id,
        #[Assert\Length(
            min: 3,
            max: 25,
            minMessage: "Name must be at least {{ limit }} characters long",
            maxMessage: "Name cannot be longer than {{ limit }} characters"
        )]
        public ?string $name = null,
        #[Assert\Length(
            min: 3,
            max: 25,
            minMessage: "Surname must be at least {{ limit }} characters long",
            maxMessage: "Surname cannot be longer than {{ limit }} characters"
        )]
        public ?string $surname = null,
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
        public ?string $phoneNumber = null,
        #[Assert\Range(
            notInRangeMessage: "Points must be between {{ min }} and {{ max }}",
            min: 0,
            max: 250,
        )]
        #[Assert\Type(
            type: 'integer',
            message: 'Points must be a valid integer'
        )]
        public ?int $points = null
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;
        return $this;
    }


}