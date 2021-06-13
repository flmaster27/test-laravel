<?php

namespace App\Console;

use App\Entities\CurrencyFactory;
use App\Models\Currency;
use App\Repositories\TickerRepositoryInterface;
use Illuminate\Console\Command;

class SyncCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync currency rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(TickerRepositoryInterface $tickerRepository, CurrencyFactory $currencyFactory)
    {
        $this->line('Start currency synchronization');

        $currencies = $tickerRepository->getCurrencies();
        $currencies->push(
            $currencyFactory->createCurrency('BTC', 1)
        );
        foreach ($currencies as $currency) {
            /** @var \App\Entities\Currency $currency */
            Currency::updateOrCreate(
                ['name' => $currency->getName()],
                ['rate' => $currency->getRate()]
            );
        }

        $this->info('Synchronization complete!');
    }
}
