<?php

namespace App\Command\Handler\Create;

use App\Command\Create\AddCustomerCommand;

readonly class AddCustomerHandler extends AbstractAddHandler
{
    public function handle(AddCustomerCommand $addCustomerCommand): ?int
    {
       $customerEntity = $addCustomerCommand->getCustomer()->toEntity();

       return $this->saveEntity($customerEntity);
    }
}