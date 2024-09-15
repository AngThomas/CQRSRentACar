<?php

namespace App\DTO\Update;

use App\Entity\CarOffer;

class UpdatedCarOfferDTO
{
    public function __construct(
    private ?string $make = null,
    private ?string $model = null,
    private ?int $horsePower = null,
    private ?float $engine = null,
    private ?int $yearOfProduction = null,
    private ?string $description = null,
    private ?string $imagePath = null
    ){}

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): void
    {
        $this->make = $make;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    public function getHorsePower(): ?int
    {
        return $this->horsePower;
    }

    public function setHorsePower(?int $horsePower): void
    {
        $this->horsePower = $horsePower;
    }

    public function getEngine(): ?float
    {
        return $this->engine;
    }

    public function setEngine(?float $engine): void
    {
        $this->engine = $engine;
    }

    public function getYearOfProduction(): ?int
    {
        return $this->yearOfProduction;
    }

    public function setYearOfProduction(?int $yearOfProduction): void
    {
        $this->yearOfProduction = $yearOfProduction;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function updateEntity(CarOffer $carOffer): CarOffer
    {
        $carOffer
            ->setMake($this->make ?? $carOffer->getMake())
            ->setModel($this->model ?? $carOffer->getModel())
            ->setHorsePower($this->horsePower ?? $carOffer->getHorsePower())
            ->setEngine($this->engine ?? $carOffer->getEngine())
            ->setYearOfProduction($this->yearOfProduction ?? $carOffer->getYearOfProduction())
            ->setDescription($this->description ?? $carOffer->getDescription())
            ->setImagePath($this->imagePath ?? $carOffer->getImagePath());

        return $carOffer;
    }
}
