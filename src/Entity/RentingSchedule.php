<?php

namespace App\Entity;

use App\Repository\RentingScheduleRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentingScheduleRepository::class)]
#[ORM\Table(name: 'renting_schedule')]
class RentingSchedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'rentingSchedule')]
    #[ORM\JoinColumn(nullable: false)]
    private CarOffer $carOffer;

    public function __construct(
    #[ORM\Column(name: 'rented_from')]
    private DateTimeInterface $rentedFrom,
    #[ORM\Column(name: 'rented_to')]
    private DateTimeInterface $rentedTo
    )
    {}

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $customer;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCarOffer(): CarOffer
    {
        return $this->carOffer;
    }

    public function setCarOffer(CarOffer $carOffer): self
    {
        $this->carOffer = $carOffer;

        return $this;
    }

    public function getRentedFrom(): DateTimeInterface
    {
        return $this->rentedFrom;
    }

    public function setRentedFrom(DateTimeInterface $rentedFrom): self
    {
        $this->rentedFrom = $rentedFrom;

        return $this;
    }

    public function getRentedTo(): DateTimeInterface
    {
        return $this->rentedTo;
    }

    public function setRentedTo(DateTimeInterface $rentedTo): self
    {
        $this->rentedTo = $rentedTo;

        return $this;
    }

    public function getRentingAgent(): RentingAgent
    {
        return $this->rentingAgent;
    }

    public function setRentingAgent(RentingAgent $rentingAgent): self
    {
        $this->rentingAgent = $rentingAgent;

        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
