<?php

namespace src\Libraries;


class Money
{
    private $amount;
    private $atmFEE = 5;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function negate()
    {
        return new Money(-1 * $this->amount);
    }


    public function invest($investment)
    {
        if ($investment < 0) throw new \InvalidArgumentException();

        $this->amount += $investment;
    }


    public function atmWithDrawl($amount)
    {
        $this->amount -= $amount;
        $this->amount -= $this->atmFEE;
    }



    // ...
}