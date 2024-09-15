<?php

namespace App\Entity;

use App\Repository\RentingAgentRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentingAgentRepository::class)]
#[ORM\Table(name: 'renting_agent')]
class RentingAgent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var Collection<int, CarOfferListing>
     */
    #[ORM\OneToMany(targetEntity: CarOfferListing::class, mappedBy: 'createdBy', orphanRemoval: true)]
    private Collection $carOfferListings;

    /**
     * @var Collection<int, RentingSchedule>
     */
    #[ORM\OneToMany(targetEntity: RentingSchedule::class, mappedBy: 'rentingAgent', orphanRemoval: true)]
    private Collection $rentingSchedule;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable', generated: 'INSERT')]
    private DateTimeInterface $createdAt;
    public function __construct(
        #[ORM\Column(length: 255)]
        private string $email,
        #[ORM\Column(length: 255)]
        private string $name,
        #[ORM\Column(length: 255, nullable: false)]
        private string $surname,
        #[ORM\Column(name: 'phone_number')]
        private string $phoneNumber,
        #[ORM\Column]
        private int $points,
    )
    {
        $this->createdAt = new DateTimeImmutable();
        $this->carOfferListings = new ArrayCollection();
        $this->rentingSchedule = new ArrayCollection();
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, CarOfferListing>
     */
    public function getCarOfferListings(): Collection
    {
        return $this->carOfferListings;
    }

    public function addCarOfferListing(CarOfferListing $carOfferListing): static
    {
        if (!$this->carOfferListings->contains($carOfferListing)) {
            $this->carOfferListings->add($carOfferListing);
            $carOfferListing->setCreatedBy($this);
        }

        return $this;
    }

    public function removeCarOfferListing(CarOfferListing $carOfferListing): static
    {
        if ($this->carOfferListings->removeElement($carOfferListing)) {
            // set the owning side to null (unless already changed)
            if ($carOfferListing->getCreatedBy() === $this) {
                $carOfferListing->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RentingSchedule>
     */
    public function getRentingSchedule(): Collection
    {
        return $this->rentingSchedule;
    }

    public function addRentingSchedule(RentingSchedule $rentingSchedule): static
    {
        if (!$this->rentingSchedule->contains($rentingSchedule)) {
            $this->rentingSchedule->add($rentingSchedule);
            $rentingSchedule->setRentingAgent($this);
        }

        return $this;
    }

    public function removeRentingSchedule(RentingSchedule $rentingSchedule): static
    {
        if ($this->rentingSchedule->removeElement($rentingSchedule)) {
            // set the owning side to null (unless already changed)
            if ($rentingSchedule->getRentingAgent() === $this) {
                $rentingSchedule->setRentingAgent(null);
            }
        }

        return $this;
    }

}
