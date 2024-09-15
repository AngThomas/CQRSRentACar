<?php

namespace App\DTO;

class RentingAgentDTO
{
    public function __construct(
        private ?int $id = null,
        private ?string $email = null,
        private ?string $name = null,
        private ?string $surname = null,
        private ?string $phoneNumber = null,
        private ?int $points = null
    ){
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): RentingAgentDTO
    {
        $this->email = $email;
        return $this;
    }


     public function getName(): ?string
     {
         return $this->name;
     }

     public function setName(?string $name): self
     {
         $this->name = $name;
         return $this;
     }

     public function getSurname(): ?string
     {
         return $this->surname;
     }

     public function setSurname(?string $surname): self
     {
         $this->surname = $surname;
         return $this;
     }

     public function getPhoneNumber(): ?string
     {
         return $this->phoneNumber;
     }

     public function setPhoneNumber(?string $phoneNumber): self
     {
         $this->phoneNumber = $phoneNumber;
         return $this;
     }

     public function getPoints(): ?int
     {
         return $this->points;
     }

     public function setPoints(?int $points): self
     {
         $this->points = $points;
         return $this;
     }



}