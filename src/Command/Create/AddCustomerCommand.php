<?php

namespace Create;

use CustomerDTO;

class AddCustomerCommand
{
    public function __construct(
        private CustomerDTO $customer
    )
    {
    }

    public function getCustomer(): CustomerDTO
    {
        return $this->customer;
    }

    public function setCustomer(CustomerDTO $customer): void
    {
        $this->customer = $customer;
    }


}