<?php

namespace App\Entity;

use App\Repository\RentingScheduleRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentingScheduleRepository::class)]
class RentingSchedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'rentingSchedule')]
    #[ORM\JoinColumn(nullable: false)]
    private CarOffer $offer;

    public function __construct(
    #[ORM\Column]
    private DateTimeInterface $rentedFrom,
    #[ORM\Column]
    private DateTimeInterface $rentedTo
    )
    {}

    #[ORM\ManyToOne(inversedBy: 'rentingSchedule')]
    #[ORM\JoinColumn(nullable: false)]
    private RentingAgent $rentingAgent;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $customer;

    public function getId(): int
    {
        return $this->id;
    }

    public function getOffer(): CarOffer
    {
        return $this->offer;
    }

    public function setOffer(CarOffer $offer): self
    {
        $this->offer = $offer;

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
