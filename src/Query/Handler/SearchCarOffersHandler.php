<?php

namespace App\Query\Handler;

use App\Entity\CarOffer;
use App\Query\CheckAvailabilityQuery;
use App\Repository\CarOfferRepository;

readonly class SearchCarOffersHandler
{
    public function __construct(
        private CarOfferRepository $carOfferRepository
    )
    {
    }

    /**
     * @return CarOffer[]
     */
    public function handle(CheckAvailabilityQuery $checkAvailabilityQuery): array
    {
        return $this->carOfferRepository->getAvailableCarOffers(
            $checkAvailabilityQuery->getCarOfferSearchDTO()
        );
    }
}