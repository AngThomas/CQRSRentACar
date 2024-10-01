<?php

namespace App\Mapper;

use App\DTO\CarOfferDTO;
use App\DTO\Response\CarOfferResponseDTO;
use App\Entity\CarOffer;
use App\Request\CreateCarOfferRequest;

use App\VO\MoneyVO;

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
            licensePlate: $createCarOfferRequest->getLicensePlate(),
            rentingAgentId: $createCarOfferRequest->getRentingAgentId(),
            priceVo: new MoneyVO(
                amount: $createCarOfferRequest->getPrice(),
                currency: $createCarOfferRequest->getCurrency()
            )
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
            licensePlate: $carOfferDTO->getLicensePlate(),
            price: $carOfferDTO->getPriceVo()->getAmount(),
            currency: $carOfferDTO->getPriceVo()->getCurrency()->value,
            imagePath: ''
        );
    }

    public static function toResponseDTO(CarOffer $carOffer): CarOfferResponseDTO
    {
        return new CarOfferResponseDTO(
            id: $carOffer->getId(),
            make: $carOffer->getMake(),
            model: $carOffer->getModel(),
            horsePower: $carOffer->getHorsePower(),
            engine: $carOffer->getEngine(),
            description: $carOffer->getDescription(),
            price: $carOffer->getPrice(),
            currency: $carOffer->getCurrency()
        );
    }

}