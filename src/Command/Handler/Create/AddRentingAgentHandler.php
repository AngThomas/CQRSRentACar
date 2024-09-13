<?php

namespace Handler\Create;

use Create\AddRentingAgentCommand;


readonly class AddRentingAgentHandler extends AbstractAddHandler
{
    public function handle(AddRentingAgentCommand $addRentingAgentCommand): ?int
    {
        $rentingAgentEntity = $addRentingAgentCommand->getRentingAgent()->toEntity();

        return $this->saveEntity($rentingAgentEntity);
    }
}