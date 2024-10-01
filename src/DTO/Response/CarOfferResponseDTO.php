<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;
class CarOfferResponseDTO
{
    public function __construct(
        #[Serializer\Since('0.1')]
        private string $id,
        #[Serializer\Since('0.1')]
        private string $make,
        #[Serializer\Since('0.1')]
        private string $model,
        #[Serializer\Since('0.1')]
        private int $horsePower,
        #[Serializer\Since('0.1')]
        private float $engine,
        #[Serializer\Since('0.1')]
        private string $description,
        #[Serializer\Since('0.1')]
        private int $price,
        #[Serializer\Since('0.1')]
        private string $currency
    ){}

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function setMake(string $make): self
    {
        $this->make = $make;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    public function setHorsePower(int $horsePower): self
    {
        $this->horsePower = $horsePower;
        return $this;
    }

    public function getEngine(): float
    {
        return $this->engine;
    }

    public function setEngine(float $engine): self
    {
        $this->engine = $engine;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }


}