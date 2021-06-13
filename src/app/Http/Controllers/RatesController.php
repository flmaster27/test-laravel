<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertRequest;
use App\Http\Resources\ConvertHistoryResource;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Services\ConvertService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RatesController extends Controller
{
    protected $convertService;

    public function __construct(ConvertService $convertService)
    {
        $this->convertService = $convertService;
    }

    public function index(Request $request)
    {
        $currencies = QueryBuilder::for(Currency::class)
            ->allowedFilters([
                AllowedFilter::exact('currency', 'name'),
            ])
            ->get();

        return CurrencyResource::collection($currencies);
    }

    public function post(ConvertRequest $request)
    {
        return new ConvertHistoryResource(
            $this->convertService->convert(
                $request->currency_from,
                $request->currency_to,
                $request->value
            )
        );
    }
}
