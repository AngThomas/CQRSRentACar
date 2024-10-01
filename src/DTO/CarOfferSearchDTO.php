<?php

namespace App\DTO;

use DateTimeImmutable;

class CarOfferSearchDTO
{
    public function __construct(
        private DateTimeImmutable $rentedFrom,
        private DateTimeImmutable $rentedTo,
        private ?int $carOfferId = null
    )
    {
    }

    public function getRentedFrom(): DateTimeImmutable
    {
        return $this->rentedFrom;
    }

    public function setRentedFrom(DateTimeImmutable $rentedFrom): self
    {
        $this->rentedFrom = $rentedFrom;
        return $this;
    }

    public function getRentedTo(): DateTimeImmutable
    {
        return $this->rentedTo;
    }

    public function setRentedTo(DateTimeImmutable $rentedTo): self
    {
        $this->rentedTo = $rentedTo;
        return $this;
    }

    public function getCarOfferId(): ?int
    {
        return $this->carOfferId;
    }

    public function setCarOfferId(?int $carOfferId): self
    {
        $this->carOfferId = $carOfferId;
        return $this;
    }


}