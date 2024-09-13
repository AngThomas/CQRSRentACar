<?php

namespace Handler\Create;

use Doctrine\ORM\EntityManagerInterface;

readonly class AbstractAddHandler
{
    public function __construct(
        protected EntityManagerInterface $entityManager
    )
    {
    }

    protected function saveEntity($entity): ?int
    {
        try {
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
            return $entity->getId();
        } catch (\Exception $e) {
            return null;
        }
    }
}