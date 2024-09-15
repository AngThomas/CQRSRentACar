<?php

namespace App\Query\Handler;


use App\Query\CheckAvailabilityQuery;
use App\Repository\RentingScheduleRepository;
use RentingAvailabilityQuery;

class CarOfferAvailabilityHandler
{
    public function __construct(
        private RentingScheduleRepository $rentingScheduleRepository
    )
    {
    }
    public function handle(CheckAvailabilityQuery $checkAvailabilityQuery): bool
    {
        $carOfferSearchDTO = $checkAvailabilityQuery->getCarOfferSearchDTO();
        $this->rentingScheduleRepository->getCarOffer($carOfferSearchDTO);
        return true;
    }
}