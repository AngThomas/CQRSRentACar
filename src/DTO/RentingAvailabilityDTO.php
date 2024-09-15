<?php

namespace App\DTO;

class RentingAvailabilityDTO
{
    public function __construct(
        private DateTimeImmutable $dateFrom,
        private DateTimeImmutable $dateTo,
        private ?int $carOfferId = null
    )
    {
    }

    public function getDateFrom(): DateTimeImmutable
    {
        return $this->dateFrom;
    }

    public function setDateFrom(DateTimeImmutable $dateFrom): self
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): DateTimeImmutable
    {
        return $this->dateTo;
    }

    public function setDateTo(DateTimeImmutable $dateTo): self
    {
        $this->dateTo = $dateTo;
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