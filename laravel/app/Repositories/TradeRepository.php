<?php

namespace App\Repositories;

use App\Models\Trade;
use App\Models\TradeList;
use \App\Service\TradeRepository as ITradeRepository;
use Illuminate\Support\Facades\Log;

class TradeRepository implements ITradeRepository
{

    /**
     * @inheritDoc
     */
    public function search(?string $fromDate, ?string $toDate) : array
    {
        $results = \DB::table('trade as t')
            ->join('currency_pair as c', 't.currency_pair_id', '=', 'c.id')
            ->select('t.*', 'c.currency_pair')
            ->when($fromDate, function($query, $fromDate) {
                return $query->where('trading_date', '>=', $fromDate);
            })->when($toDate, function ($query, $toDate) {
                return $query->where('trading_date', '<=', $toDate);
            })->orderBy('t.trading_date')
            ->get()->all();

        // stdClass を TradeList に変換して返す。
        return array_map(function ($trade) {
            return new TradeList($trade);
        }, $results);
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): Trade
    {
        $trade = \DB::table('trade')->find($id);

        // stdClass を Trade に変換して返す。
        return Trade::create()
                ->setId($trade->id)
                ->setTradingDate($trade->trading_date)
                ->setSettlementDate($trade->settlement_date)
                ->setCurrencyPairId($trade->currency_pair_id)
                ->setTradeType($trade->trade_type)
                ->setQuantity($trade->quantity)
                ->setEntryPrice($trade->entry_price)
                ->setExitPrice($trade->exit_price)
                ->setStopLoss($trade->stop_loss)
                ->setProfit($trade->profit)
                ->setComment($trade->comment);
    }

    /**
     * @inheritDoc
     */
    public function insert(Trade $trade) : int
    {
        /* これは  SQLSTATE[23502]: Not null violation: でエラーになるので使えなかった。
        \DB::table('trade')->updateOrInsert([
            'trading_date' => $trade->getTradingDate(),
            'settlement_date' => $trade->getSettlementDate(),
            'currency_pair_id' => $trade->getCurrencyPairId(),
            'trade_type' => $trade->getTradeType(),
            'quantity' => $trade->getQuantity(),
            'entry_price' => $trade->getEntryPrice(),
            'exit_price' => $trade->getEntryPrice(),
            'stop_loss' => $trade->getStopLoss(),
            'profit' => $trade->getProfit(),
            'comment' => $trade->getComment()
        ], ['id' => $trade->getId()]);
        */

        return \DB::table('trade')->insertGetId([
            'trading_date' => $trade->getTradingDate(),
            'settlement_date' => $trade->getSettlementDate(),
            'currency_pair_id' => $trade->getCurrencyPairId(),
            'trade_type' => $trade->getTradeType(),
            'quantity' => $trade->getQuantity(),
            'entry_price' => $trade->getEntryPrice(),
            'exit_price' => $trade->getEntryPrice(),
            'stop_loss' => $trade->getStopLoss(),
            'profit' => $trade->getProfit(),
            'comment' => $trade->getComment()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function update(Trade $trade) : void
    {
        \DB::table('trade')
            ->where('id', $trade->getId())
            ->update([
                'trading_date' => $trade->getTradingDate(),
                'settlement_date' => $trade->getSettlementDate(),
                'currency_pair_id' => $trade->getCurrencyPairId(),
                'trade_type' => $trade->getTradeType(),
                'quantity' => $trade->getQuantity(),
                'entry_price' => $trade->getEntryPrice(),
                'exit_price' => $trade->getEntryPrice(),
                'stop_loss' => $trade->getStopLoss(),
                'profit' => $trade->getProfit(),
                'comment' => $trade->getComment()
            ]);
    }

    /**
     * @inheritDoc
     */
    public function delete(array $ids): void
    {
        \DB::table('trade')->whereIn('id', $ids)->delete();
    }
}
