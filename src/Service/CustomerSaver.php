<?php

namespace App\Service;

use App\DTO\Update\AddCustomerDTO;

class CustomerSaver
{
    public function save(AddCustomerDTO $addCustomerDTO)
    {
        $customer = $addCustomerDTO->toEntity();
    }
}