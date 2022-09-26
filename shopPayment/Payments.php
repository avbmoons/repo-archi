<?php

class Payments
{
    private $phoneNumber;
    private $totalCost;
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
    public function getTotalCost(): float
    {
        return $this->totalCost;
    }
}
