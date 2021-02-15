<?php


namespace App\Service;


use App\Models\Trade;
use App\Models\TradeList;

interface TradeRepository
{
    /**
     * @param string|null $fromDate 検索開始日
     * @param string|null $toDate 検索終了日
     * @return array
     */
    public function search(?string $fromDate, ?string $toDate) : array;

    /**
     * IDで取得
     * @param int $id ID
     * @return Trade
     */
    public function find(int $id) : Trade;

    /**
     * @param Trade $trade
     * @return int
     */
    public function insert(Trade $trade) : int;

    /**
     * @param Trade $trade
     */
    public function update(Trade $trade) : void;

    /**
     * @param array $ids
     */
    public function delete(array $ids) : void;
}
