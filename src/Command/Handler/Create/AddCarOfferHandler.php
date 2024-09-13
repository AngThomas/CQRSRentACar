<?php

namespace Handler\Create;

use Create\AddCarOfferCommand;


readonly class AddCarOfferHandler extends AbstractAddHandler
{
    public function handle(AddCarOfferCommand $addCarOfferCommand): ?int
    {
        $carOfferEntity = $addCarOfferCommand->getCarOffer()->toEntity();

        return $this->saveEntity($carOfferEntity);
    }
}