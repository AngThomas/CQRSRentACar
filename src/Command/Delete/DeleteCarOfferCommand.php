<?php

namespace App\Command\Delete;

class DeleteCarOfferCommand
{
    public function __construct(
        private int $id
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}