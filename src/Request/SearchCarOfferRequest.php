<?php

namespace App\Request;

use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;

class SearchCarOfferRequest
{
    public function __construct(
        private DateTimeImmutable $rentedFrom,
        private DateTimeImmutable $rentedTo,
        #[Assert\Range(
            notInRangeMessage: 'ID must be between {{ min }} and {{ max }}.',
            min: 1,
            max: 10000
        )]
        #[Assert\Type(type: 'integer', message: 'ID must be an integer.')]
        private ?int $id = null,
    )
    {
    }

    public function getRentedFrom(): DateTimeImmutable
    {
        return $this->rentedFrom;
    }

    public function setRentedFrom(DateTimeImmutable $rentedFrom): SearchCarOfferRequest
    {
        $this->rentedFrom = $rentedFrom;
        return $this;
    }

    public function getRentedTo(): DateTimeImmutable
    {
        return $this->rentedTo;
    }

    public function setRentedTo(DateTimeImmutable $rentedTo): self
    {
        $this->rentedTo = $rentedTo;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }


}