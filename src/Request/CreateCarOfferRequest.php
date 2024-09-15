<?php

namespace App\Request;

use App\Enum\Currency;
use Symfony\Component\Validator\Constraints as Assert;
class CreateCarOfferRequest
{
    public function __construct(
        #[Assert\NotBlank(message: "Make cannot be blank")]
        #[Assert\Length(
            min: 4,
            max: 30,
            minMessage: "Make must be at least {{ limit }} characters long",
            maxMessage: "Make cannot be longer than {{ limit }} characters"
        )]
        private string $make,
        #[Assert\NotBlank(message: "Model cannot be blank")]
        #[Assert\Length(
            min: 4,
            max: 30,
            minMessage: "Model must be at least {{ limit }} characters long",
            maxMessage: "Model cannot be longer than {{ limit }} characters"
        )]
        private string $model,
        #[Assert\NotBlank(message: "Horse power cannot be blank")]
        #[Assert\Type(type: 'integer', message: "Horse power must be an integer")]
        #[Assert\Range(
            notInRangeMessage: "Horse power must be between {{ min }} and {{ max }}",
            min: 20,
            max: 4000
        )]
        private int $horsePower,
        #[Assert\NotBlank(message: "Engine capacity cannot be blank")]
        #[Assert\Type(type: 'float', message: "Engine capacity must be a float")]
        #[Assert\Range(
            notInRangeMessage: "Engine capacity must be between {{ min }} and {{ max }}",
            min: 0.5,
            max: 9.99
        )]
        private float $engine,
        #[Assert\NotBlank(message: "Year of production cannot be blank")]
        #[Assert\Type(type: 'integer', message: "Year of production must be an integer")]
        #[Assert\Range(
            notInRangeMessage: "Year of production must be between {{ min }} and {{ max }}",
            min: 2000,
            max: 2100
        )]
        private int $yearOfProduction,
        #[Assert\NotBlank(message: "Description cannot be blank")]
        #[Assert\Length(
            min: 30,
            max: 999,
            minMessage: "Description must be at least {{ limit }} characters long",
            maxMessage: "Description cannot be longer than {{ limit }} characters"
        )]
        private string $description,
        #[Assert\NotBlank(message: "License plate cannot be blank")]
        #[Assert\Length(
            min: 2,
            max: 15,
            minMessage: "License plate must be at least {{ limit }} characters long",
            maxMessage: "License plate cannot be longer than {{ limit }} characters"
        )]
        private string $licensePlate,
        #[Assert\NotBlank(message: "Renting agent ID cannot be blank")]
        #[Assert\Type(type: 'integer', message: "Renting agent ID must be an integer")]
        #[Assert\Range(
            notInRangeMessage: "Renting agent ID must be between {{ min }} and {{ max }}",
            min: 1,
            max: 999
        )]
        private int $rentingAgentId,
        #[Assert\NotBlank(message: "Listing base price cannot be blank")]
        #[Assert\Type(type: 'integer', message: "Listing base price must be an integer")]
        #[Assert\Range(
            notInRangeMessage: "Listing base price must be between {{ min }} and {{ max }}",
            min: 200,
            max: 6000
        )]
        private int $price,
        #[Assert\NotBlank(message: "Listing currency cannot be blank")]
        private Currency $currency,
    ){}

    public function getMake(): string
    {
        return $this->make;
    }

    public function setMake(string $make): void
    {
        $this->make = $make;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    public function setHorsePower(int $horsePower): void
    {
        $this->horsePower = $horsePower;
    }

    public function getEngine(): float
    {
        return $this->engine;
    }

    public function setEngine(float $engine): void
    {
        $this->engine = $engine;
    }

    public function getYearOfProduction(): int
    {
        return $this->yearOfProduction;
    }

    public function setYearOfProduction(int $yearOfProduction): void
    {
        $this->yearOfProduction = $yearOfProduction;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): self
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getRentingAgentId(): int
    {
        return $this->rentingAgentId;
    }

    public function setRentingAgentId(int $rentingAgentId): void
    {
        $this->rentingAgentId = $rentingAgentId;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): CreateCarOfferRequest
    {
        $this->currency = $currency;
        return $this;
    }


}