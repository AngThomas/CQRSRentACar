<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

class SearchResponseDTO
{
    /**
     * @param CarOfferResponseDTO[] $carOffers
     */
    public function __construct(
        #[Serializer\SerializedName('available_rentals'), Serializer\Type('array<'.CarOfferResponseDTO::class.'>'), Serializer\Since('0.1')]
        private array $carOffers
    ){}

    public function getCarOffers(): array
    {
        return $this->carOffers;
    }

    public function setCarOffers(array $carOffers): self
    {
        $this->carOffers = $carOffers;
        return $this;
    }


}