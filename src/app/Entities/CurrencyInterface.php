<?php

namespace App\Entities;

/**
 * Interface CurrencyInterface
 * @package App\Entities
 */
interface CurrencyInterface
{
    /**
     * @return float
     */
    public function getRate(): float;
}
