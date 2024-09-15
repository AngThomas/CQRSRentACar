<?php

namespace App\Query\Handler;


use App\Repository\RentingScheduleRepository;
use RentingAvailabilityQuery;

class CarOfferAvailabilityHandler
{
    public function __construct(
        private RentingScheduleRepository $rentingScheduleRepository
    )
    {
    }
    public function handle(RentingAvailabilityQuery $carOfferAvailabilityQuery): bool
    {
        $availabilityDTO = $carOfferAvailabilityQuery->getRentingAvailabilityDTO();
        $this->rentingScheduleRepository->getCarOffer($availabilityDTO);
    }
}