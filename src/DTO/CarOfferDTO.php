<?php

use App\Entity\CarOffer;

class CarOfferDTO
{
    public function __construct(
        private string $make,
        private string $model,
        private int $horsePower,
        private float $engine,
        private int $yearOfProduction,
        private string $description,
        private string $imagePath,
    )
    {
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function setMake(string $make): CarOfferDTO
    {
        $this->make = $make;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): CarOfferDTO
    {
        $this->model = $model;
        return $this;
    }

    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    public function setHorsePower(int $horsePower): CarOfferDTO
    {
        $this->horsePower = $horsePower;
        return $this;
    }

    public function getEngine(): float
    {
        return $this->engine;
    }

    public function setEngine(float $engine): CarOfferDTO
    {
        $this->engine = $engine;
        return $this;
    }

    public function getYearOfProduction(): int
    {
        return $this->yearOfProduction;
    }

    public function setYearOfProduction(int $yearOfProduction): CarOfferDTO
    {
        $this->yearOfProduction = $yearOfProduction;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): CarOfferDTO
    {
        $this->description = $description;
        return $this;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): CarOfferDTO
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    public function toEntity(): CarOffer
    {
        return new CarOffer(
            make: $this->make,
            model: $this->model,
            horsePower: $this->horsePower,
            engine: $this->engine,
            yearOfProduction: $this->yearOfProduction,
            description: $this->description,
            imagePath: $this->imagePath
        );
    }

}
