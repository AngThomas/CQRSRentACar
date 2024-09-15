<?php

namespace App\Query;
use App\DTO\RentingAvailabilityDTO;

class RentingAvailabilityQuery
{
    public function __construct(
        private RentingAvailabilityDTO $rentingAvailabilityDTO
    )
    {
    }

    public function getRentingAvailabilityDTO(): RentingAvailabilityDTO
    {
        return $this->rentingAvailabilityDTO;
    }

    public function setRentingAvailabilityDTO(RentingAvailabilityDTO $rentingAvailabilityDTO): void
    {
        $this->rentingAvailabilityDTO = $rentingAvailabilityDTO;
    }


}