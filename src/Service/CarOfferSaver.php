<?php

namespace App\Service;


use App\DTO\CarOfferDTO;
use App\Entity\CarOfferListing;
use App\Mapper\CarOfferMapper;
use App\Repository\RentingAgentRepository;
;

use Doctrine\ORM\EntityManagerInterface;
use Exception;

readonly class CarOfferSaver
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private RentingAgentRepository $rentingAgentRepository
    )
    {
    }
    public function save(CarOfferDTO $carOfferDTO): int
    {
        $rentingAgent = $this->rentingAgentRepository->find($carOfferDTO->getRentingAgentId());

        if (!$rentingAgent) {
            throw new Exception("RentingAgent with ID {$carOfferDTO->getRentingAgentId()} not found.");
        }

        $carOffer = CarOfferMapper::toNewEntity($carOfferDTO);
        $carOffer->setRentingAgent($rentingAgent);

        $this->entityManager->persist($carOffer);
        $this->entityManager->flush();
        return $carOffer->getId();
    }
}