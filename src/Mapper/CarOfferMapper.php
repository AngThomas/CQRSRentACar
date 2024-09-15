<?php

namespace App\Mapper;

use App\DTO\CarOfferDTO;
use App\Entity\CarOffer;
use App\Request\CreateCarOfferRequest;
use App\Request\UpdateRentingAgentRequest;
use App\DTO\RentingAgentDTO;
use App\Entity\RentingAgent;

class CarOfferMapper
{
    public static function fromCreateRequest(CreateCarOfferRequest $createCarOfferRequest): CarOfferDTO
    {
        return new CarOfferDTO(
            make: $createCarOfferRequest->getMake(),
            model: $createCarOfferRequest->getModel(),
            horsePower: $createCarOfferRequest->getHorsePower(),
            engine: $createCarOfferRequest->getEngine(),
            yearOfProduction: $createCarOfferRequest->getYearOfProduction(),
            description: $createCarOfferRequest->getDescription(),
            rentingAgentId: $createCarOfferRequest->getRentingAgentId(),
            listingBasePrice: $createCarOfferRequest->getListingBasePrice()
        );
    }

    public static function toNewEntity(CarOfferDTO $carOfferDTO): CarOffer
    {
        return new CarOffer(
            make: $carOfferDTO->getMake(),
            model: $carOfferDTO->getModel(),
            horsePower: $carOfferDTO->getHorsePower(),
            engine: $carOfferDTO->getEngine(),
            yearOfProduction: $carOfferDTO->getYearOfProduction(),
            description: $carOfferDTO->getDescription(),
            imagePath: ''
        );
    }
}