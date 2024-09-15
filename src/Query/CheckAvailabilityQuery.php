<?php

namespace App\Query;
use App\DTO\CarOfferSearchDTO;

class CheckAvailabilityQuery
{
    public function __construct(
        private CarOfferSearchDTO $carOfferSearchDTO
    )
    {
    }

    public function getCarOfferSearchDTO(): CarOfferSearchDTO
    {
        return $this->carOfferSearchDTO;
    }

    public function setCarOfferSearchDTO(CarOfferSearchDTO $carOfferSearchDTO): void
    {
        $this->carOfferSearchDTO = $carOfferSearchDTO;
    }


}