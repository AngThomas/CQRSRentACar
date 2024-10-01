<?php

namespace App\Command\Create;


use App\DTO\RentingAgentDTO;

class CreateRentingAgentCommand
{
    public function __construct(
        private RentingAgentDTO $rentingAgent
    )
    {
    }

    public function getRentingAgent(): RentingAgentDTO
    {
        return $this->rentingAgent;
    }

    public function setRentingAgent(RentingAgentDTO $rentingAgent): void
    {
        $this->rentingAgent = $rentingAgent;
    }


}