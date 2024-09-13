<?php

namespace Create;
use RentingAgentDTO;

class AddRentingAgentCommand
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