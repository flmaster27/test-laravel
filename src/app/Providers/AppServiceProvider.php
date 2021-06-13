<?php

namespace App\Providers;

use App\Http\Resources\CurrencyResource;
use App\Repositories\TickerBlockchainRepository;
use App\Repositories\TickerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        CurrencyResource::withoutWrapping();

        $this->app->bind(
            TickerRepositoryInterface::class,
            TickerBlockchainRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
