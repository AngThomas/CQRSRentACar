<?php

namespace App\Entity;

use App\Repository\CarOfferListingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarOfferListingRepository::class)]
#[ORM\Table(name: 'car_offer_listing')]
class CarOfferListing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var Collection<int, CarOffer>
     */
    #[ORM\OneToMany(targetEntity: CarOffer::class, mappedBy: 'carOfferListing', cascade:['persist'] )]
    private Collection $offer;

    #[ORM\ManyToOne(inversedBy: 'carOfferListings')]
    #[ORM\JoinColumn(nullable: false)]
    private RentingAgent $createdBy;

    public function __construct(
        #[ORM\Column(name: 'base_price')]
        private int $basePrice
    )
    {
        $this->offer = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, CarOffer>
     */
    public function getOffer(): Collection
    {
        return $this->offer;
    }

    public function addOffer(CarOffer $offer): self
    {
        if (!$this->offer->contains($offer)) {
            $this->offer->add($offer);
            $offer->setCarOfferListing($this);
        }

        return $this;
    }

    public function removeOffer(CarOffer $offer): self
    {
        if ($this->offer->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getCarOfferListing() === $this) {
                $offer->setCarOfferListing(null);
            }
        }

        return $this;
    }

    public function getBasePrice(): int
    {
        return $this->basePrice;
    }

    public function setBasePrice(int $basePrice): self
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    public function getCreatedBy(): RentingAgent
    {
        return $this->createdBy;
    }

    public function setCreatedBy(RentingAgent $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
