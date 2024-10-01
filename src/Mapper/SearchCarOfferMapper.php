<?php

namespace App\Mapper;

use App\DTO\CarOfferSearchDTO;
use App\Request\SearchCarOfferRequest;

class SearchCarOfferMapper
{
    public static function fromSearchRequest(SearchCarOfferRequest $searchCarOfferRequest): CarOfferSearchDTO
    {
        return new CarOfferSearchDTO(
            rentedFrom: $searchCarOfferRequest->getRentedFrom(),
            rentedTo: $searchCarOfferRequest->getRentedTo()
        );
    }
}