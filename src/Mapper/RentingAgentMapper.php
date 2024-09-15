<?php

namespace App\Mapper;

use App\Request\CreateRentingAgentRequest;
use App\Request\UpdateRentingAgentRequest;
use App\DTO\RentingAgentDTO;
use App\Entity\RentingAgent;

class RentingAgentMapper
{
    public static function fromCreateRequest(CreateRentingAgentRequest $createRentingAgentRequest): RentingAgentDTO
    {
        return new RentingAgentDTO(
            email: $createRentingAgentRequest->getEmail(),
            name: $createRentingAgentRequest->getName(),
            surname: $createRentingAgentRequest->getSurname(),
            phoneNumber: $createRentingAgentRequest->getPhoneNumber(),
            points: $createRentingAgentRequest->getPoints()
        );
    }

    public static function fromUpdateRequest(UpdateRentingAgentRequest $updateRentingAgentRequest): RentingAgentDTO
    {
        return new RentingAgentDTO(
            id: $updateRentingAgentRequest->getId(),
            name: $updateRentingAgentRequest->getName(),
            surname: $updateRentingAgentRequest->getSurname(),
            phoneNumber: $updateRentingAgentRequest->getPhoneNumber(),
            points: $updateRentingAgentRequest->getPoints()
        );
    }

    public static function toNewEntity(RentingAgentDTO $rentingAgentDTO): RentingAgent
    {
        return new RentingAgent(
            email: $rentingAgentDTO->getEmail(),
            name: $rentingAgentDTO->getName(),
            surname: $rentingAgentDTO->getSurname(),
            phoneNumber: $rentingAgentDTO->getPhoneNumber(),
            points: $rentingAgentDTO->getPoints()
        );
    }
}