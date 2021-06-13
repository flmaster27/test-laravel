<?php


namespace App\Services;

use App\Models\ConvertHistory;
use App\Models\Currency;
use Carbon\Carbon;

/**
 * Class ConvertService
 * @package App\Services
 */
class ConvertService
{
    /**
     * @param string $from
     * @param string $to
     * @param float $value
     * @return mixed
     */
    public function convert(string $from, string $to, float $value)
    {
        if ($to == 'BTC') {
            $rate = Currency::where('name', $from)->first()->rate;
            $rate = 1 / $rate;
            $convertedValue = round($value * $rate, 10);
        } else {
            $rate = Currency::where('name', $to)->first()->rate;
            $convertedValue = round($value * $rate, 2);
        }


        return ConvertHistory::create(
            [
                'currency_from' => $from,
                'currency_to' => $to,
                'value' => $value,
                'converted_value' => $convertedValue,
                'rate' => $rate,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
