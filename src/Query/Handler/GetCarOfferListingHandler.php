<?php

namespace App\Query\Handler;

use App\Entity\CarOfferListing;
use App\Repository\CarOfferListingRepository;
use RentingAvailabilityQuery;

readonly class GetCarOfferListingHandler
{
    public function __construct(
        private CarOfferListingRepository $carOfferListingRepository
    )
    {
    }

    /**
     * @return CarOfferListing[]
     */
    public function handle(RentingAvailabilityQuery $rentingAvailabilityQuery): array
    {
        return $this->carOfferListingRepository->getAvailableCarOffers(
            $rentingAvailabilityQuery->getRentingAvailabilityDTO()
        );
    }
}