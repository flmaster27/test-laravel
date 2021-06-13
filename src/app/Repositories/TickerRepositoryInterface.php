<?php


namespace App\Repositories;

use Illuminate\Support\Collection;

/**
 * Interface TickerRepositoryInterface
 * @package App\Repositories
 */
interface TickerRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getCurrencies(): Collection;
}
