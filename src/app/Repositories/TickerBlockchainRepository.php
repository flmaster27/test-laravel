<?php


namespace App\Repositories;

use App\Entities\CurrencyFactory;
use App\Entities\CurrencyInterface;
use App\Exceptions\NoRatesDataException;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Throwable;

/**
 * Class TickerBlockchainRepository
 * @package App\Repositories
 */
class TickerBlockchainRepository implements TickerRepositoryInterface
{
    /** @var Client */
    protected $client;

    /** @var CurrencyFactory */
    protected $currencyFactory;

    /**
     * TickerBlockchainRepository constructor.
     * @param Client $client
     * @param CurrencyFactory $currencyFactory
     */
    public function __construct(Client $client, CurrencyFactory $currencyFactory)
    {
        $this->client = $client;
        $this->currencyFactory = $currencyFactory;
    }

    /**
     * @return Collection
     * @throws NoRatesDataException
     */
    public function getCurrencies(): Collection
    {
        try {
            $collection = collect();
            $response = $this->client->request('GET', 'https://blockchain.info/ticker');
            $responseData = json_decode($response->getBody());

            foreach ($responseData as $currencyName => $currencyData) {
                $collection->push($this->currencyFactory->createCurrency(
                    $currencyName,
                    $currencyData->last
                ));
            }

            return $collection;
        } catch (Throwable $exception) {
            throw new NoRatesDataException();
        }
    }
}
