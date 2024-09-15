<?php

namespace App\DTO;


use App\Entity\CarOffer;
use App\VO\MoneyVO;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CarOfferDTO
{
    public function __construct(
        private ?string $make = null,
        private ?string $model = null,
        private ?int $horsePower = null,
        private ?float $engine = null,
        private ?int $yearOfProduction = null,
        private ?string $description = null,
        private ?string $licensePlate = null,
        private ?int $rentingAgentId = null,
        private ?MoneyVO $priceVo = null,
        private ?string $imagePath = null,
        private ?array $files = []
    )
    {
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): self
    {
        $this->make = $make;
        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getHorsePower(): ?int
    {
        return $this->horsePower;
    }

    public function setHorsePower(?int $horsePower): self
    {
        $this->horsePower = $horsePower;
        return $this;
    }

    public function getEngine(): ?float
    {
        return $this->engine;
    }

    public function setEngine(?float $engine): self
    {
        $this->engine = $engine;
        return $this;
    }

    public function getYearOfProduction(): ?int
    {
        return $this->yearOfProduction;
    }

    public function setYearOfProduction(?int $yearOfProduction): self
    {
        $this->yearOfProduction = $yearOfProduction;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getLicensePlate(): ?string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(?string $licensePlate): self
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): self
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    public function getRentingAgentId(): ?int
    {
        return $this->rentingAgentId;
    }

    public function setRentingAgentId(?int $rentingAgentId): self
    {
        $this->rentingAgentId = $rentingAgentId;
        return $this;
    }

    public function getPriceVo(): ?MoneyVO
    {
        return $this->priceVo;
    }

    public function setPriceVo(?MoneyVO $priceVo): CarOfferDTO
    {
        $this->priceVo = $priceVo;
        return $this;
    }


    /**
     * @return UploadedFile[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(?array $files): self
    {
        $this->files = $files;
        return $this;
    }
}
