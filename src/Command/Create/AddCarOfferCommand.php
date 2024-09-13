<?php

namespace Create;
use CarOfferDTO;

class AddCarOfferCommand
{
    public function __construct
    (
        private CarOfferDTO $carOffer
    )
    {
    }

    public function getCarOffer(): CarOfferDTO
    {
        return $this->carOffer;
    }

    public function setCarOffer(CarOfferDTO $carOffer): void
    {
        $this->carOffer = $carOffer;
    }


}