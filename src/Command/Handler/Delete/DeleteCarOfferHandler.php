<?php

namespace App\Command\Handler\Delete;

use App\Command\Delete\DeleteCarOfferCommand;
use App\Repository\CarOfferRepository;


use Doctrine\ORM\EntityManagerInterface;

readonly class DeleteCarOfferHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CarOfferRepository $carOfferRepository
    ){}
    public function handle(DeleteCarOfferCommand $command): ?int
    {
        $carOfferId = $command->getId();

        $carOffer = $this->carOfferRepository->find($carOfferId);

        $carOfferListing = $carOffer->getCarOfferListing();
        if ($carOfferListing !== null) {
            $carOfferListing->removeOffer($carOffer);
            $this->entityManager->persist($carOfferListing);
        }

        try {
            $this->entityManager->remove($carOffer);
            $this->entityManager->flush();

            return $carOfferId;

        } catch (\Exception $e) {
            return null;
        }
    }
}