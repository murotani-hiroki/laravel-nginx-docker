<?php


namespace App\Service;


use App\Models\CurrencyPair;

interface CurrencyPairRepository
{

    /**
     * 全件取得
     * @return array
     */
    public function findAll() : array;

}
