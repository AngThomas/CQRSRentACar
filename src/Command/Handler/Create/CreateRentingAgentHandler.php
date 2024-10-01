<?php

namespace App\Command\Handler\Create;

use App\Command\Create\CreateRentingAgentCommand;
use App\Mapper\RentingAgentMapper;
use Doctrine\ORM\EntityManagerInterface;

readonly class CreateRentingAgentHandler
{
    public function __construct
    (
        private EntityManagerInterface $entityManager
    )
    {
    }

    public function handle(CreateRentingAgentCommand $createRentingAgentCommand): ?int
    {
        $rentingAgent = RentingAgentMapper::toNewEntity($createRentingAgentCommand->getRentingAgent());

        $this->entityManager->persist($rentingAgent);
        $this->entityManager->flush();
        return $rentingAgent->getId();
    }
}