<?php

use App\Entity\RentingAgent;

class RentingAgentDTO
{
    public function toEntity(): RentingAgent
    {
        return new RentingAgent();
    }

}