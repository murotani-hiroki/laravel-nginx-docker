<?php


namespace App\Repositories;

use App\Models\CurrencyPair;
use \App\Service\CurrencyPairRepository as ICurrencyPairRepository;

class CurrencyPairRepository implements ICurrencyPairRepository
{

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        $results = \DB::table('currency_pair')->get()->all();

        // stdClass を TradeList に変換して返す。
        return array_map(function ($currencyPair) {
            return new CurrencyPair($currencyPair);
        }, $results);
    }
}
