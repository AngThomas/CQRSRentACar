<?php

namespace App\Command\Update;

use App\DTO\Update\UpdatedCarOfferDTO;

class UpdateCarOfferCommand
{
    public function __construct(
        private UpdatedCarOfferDTO $updatedCarOffer
    )
    {
    }

    public function getUpdatedCarOffer(): UpdatedCarOfferDTO
    {
        return $this->updatedCarOffer;
    }

    public function setUpdatedCarOffer(UpdatedCarOfferDTO $updatedCarOffer): void
    {
        $this->updatedCarOffer = $updatedCarOffer;
    }


}