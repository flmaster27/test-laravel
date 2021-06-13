<?php


namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 * @package App\Entities
 */
class Currency extends Model implements CurrencyInterface
{
    /** @var float */
    protected $rate;

    /** @var string */
    protected $name;

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return Currency
     */
    public function setRate(float $rate): Currency
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Currency
     */
    public function setName(string $name): Currency
    {
        $this->name = $name;
        return $this;
    }
}
