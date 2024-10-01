<?php

namespace App\Request;

class RentCarRequest
{
    public function __construct(
        private int $carOfferId,
        private DateTimeImmutable $rentFrom,
        private DateTimeImmutable $rentTo,
        private string $customerEmail,
        private string $customerName,
        private string $customerSurname,
        private int $customerAge
    )
    {}

    public function getCarOfferId(): int
    {
        return $this->carOfferId;
    }

    public function setCarOfferId(int $carOfferId): RentCarRequest
    {
        $this->carOfferId = $carOfferId;
        return $this;
    }

    public function getRentFrom(): DateTimeImmutable
    {
        return $this->rentFrom;
    }

    public function setRentFrom(DateTimeImmutable $rentFrom): RentCarRequest
    {
        $this->rentFrom = $rentFrom;
        return $this;
    }

    public function getRentTo(): DateTimeImmutable
    {
        return $this->rentTo;
    }

    public function setRentTo(DateTimeImmutable $rentTo): RentCarRequest
    {
        $this->rentTo = $rentTo;
        return $this;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): RentCarRequest
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): RentCarRequest
    {
        $this->customerName = $customerName;
        return $this;
    }

    public function getCustomerSurname(): string
    {
        return $this->customerSurname;
    }

    public function setCustomerSurname(string $customerSurname): RentCarRequest
    {
        $this->customerSurname = $customerSurname;
        return $this;
    }

    public function getCustomerAge(): int
    {
        return $this->customerAge;
    }

    public function setCustomerAge(int $customerAge): RentCarRequest
    {
        $this->customerAge = $customerAge;
        return $this;
    }


}