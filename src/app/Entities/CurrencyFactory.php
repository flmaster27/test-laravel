<?php


namespace App\Entities;

/**
 * Class CurrencyFactory
 * @package App\Entities
 */
class CurrencyFactory
{
    /**
     * @param string $name
     * @param float $rate
     * @return Currency
     */
    public function createCurrency(string $name, float $rate): Currency
    {
        return (new Currency())
            ->setName($name)
            ->setRate($rate)
        ;
    }
}
