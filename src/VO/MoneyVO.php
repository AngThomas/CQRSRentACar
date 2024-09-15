<?php

namespace App\VO;

use App\Enum\Currency;

class MoneyVO
{
    public function __construct(
        private int $amount,
        private Currency $currency
    ){

    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }


}