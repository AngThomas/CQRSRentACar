<?php

namespace App\Entity;

use App\Repository\CarOfferRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarOfferRepository::class)]
#[ORM\Table(name: 'car_offer')]
class CarOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'offer')]
    private ?CarOfferListing $carOfferListing = null;

    /**
     * @var Collection<int, RentingSchedule>
     */
    #[ORM\OneToMany(targetEntity: RentingSchedule::class, mappedBy: 'offer', orphanRemoval: true)]
    private Collection $rentingSchedule;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable', generated: 'INSERT')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable', generated: 'ALWAYS')]
    private DateTimeInterface $updatedAt;
    public function __construct(
        #[ORM\Column(length: 100)]
        private string $make,
        #[ORM\Column(length: 100)]
        private string $model,
        #[ORM\Column(name: 'horse_power')]
        private int $horsePower,
        #[ORM\Column(nullable: false)]
        private float $engine,
        #[ORM\Column(name: 'year_of_production')]
        private int $yearOfProduction,
        #[ORM\Column]
        private string $description,
        #[ORM\Column(name: 'image_path', length: 255)]
        private string $imagePath,

    )
    {
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->rentingSchedule = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function setMake(string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    public function setHorsepower(int $horsePower): self
    {
        $this->horsePower = $horsePower;

        return $this;
    }

    public function getEngine(): int
    {
        return $this->engine;
    }

    public function setEngine(int $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getYearOfProduction(): int
    {
        return $this->yearOfProduction;
    }

    public function setYearOfProduction(int $yearOfProduction): self
    {
        $this->yearOfProduction = $yearOfProduction;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


    public function getCarOfferListing(): ?CarOfferListing
    {
        return $this->carOfferListing;
    }

    public function setCarOfferListing(?CarOfferListing $carOfferListing): static
    {
        $this->carOfferListing = $carOfferListing;

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
            $rentingSchedule->setOffer($this);
        }

        return $this;
    }

    public function removeRentingSchedule(RentingSchedule $rentingSchedule): static
    {
        if ($this->rentingSchedule->removeElement($rentingSchedule)) {
            // set the owning side to null (unless already changed)
            if ($rentingSchedule->getOffer() === $this) {
                $rentingSchedule->setOffer(null);
            }
        }

        return $this;
    }


}
