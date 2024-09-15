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
     * @var Collection<int, CarOffer>
     */
    #[ORM\OneToMany(targetEntity: CarOffer::class, mappedBy: 'rentingAgent', orphanRemoval: true)]
    private Collection $carOffer;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable', generated: 'INSERT')]
    private DateTimeInterface $createdAt;
    public function __construct(
        #[ORM\Column(length: 255, unique: true)]
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
     * @return Collection<int, CarOffer>
     */
    public function getCarOffer(): Collection
    {
        return $this->carOffer;
    }

    public function addCarOffer(CarOffer $carOffer): static
    {
        if (!$this->carOffer->contains($carOffer)) {
            $this->carOffer->add($carOffer);
            $carOffer->setRentingAgent($this);
        }

        return $this;
    }

}
