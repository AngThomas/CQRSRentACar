<?php

namespace App\Service;

use App\Repository\CarOfferRepository;
use App\Repository\RentingScheduleRepository;
use Delete\DeleteCarOfferCommand;
use Doctrine\ORM\EntityNotFoundException;
use Handler\Delete\DeleteCarOfferHandler;

readonly class CarOfferRemover
{
    public function __construct(
        private CarOfferRepository $carOfferRepository,
        private RentingScheduleRepository $rentingScheduleRepository,
        private DeleteCarOfferHandler $deleteCarOfferHandler
    ) {
    }

    public function removeCarOffer(int $carOfferId): void
    {
        $carOffer = $this->carOfferRepository->find($carOfferId);

        if ($carOffer === null) {
            throw new EntityNotFoundException("CarOffer with ID $carOfferId not found.");
        }

        $hasRentingSchedule = $this->rentingScheduleRepository->findBy(['offer' => $carOffer]);

        if (!empty($hasRentingSchedule)) {
            throw new \Exception("CarOffer with ID $carOfferId cannot be deleted because it exists in renting schedule.");
        }
        $command = new DeleteCarOfferCommand($carOfferId);
        $this->deleteCarOfferHandler->handle($command);
    }
}
