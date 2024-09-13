<?php

use App\Entity\Customer;

class CustomerDTO
{
    public function toEntity(): Customer
    {
        return new Customer();
    }
}