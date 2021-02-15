<?php


namespace App\Service;


use App\Models\Trade;
use Illuminate\Support\Facades\Log;

class FxService
{
    /** @var TradeRepository */
    private $tradeRepository;

    /** @var CurrencyPairRepository */
    private $currencyPairRepository;

    /**
     * FxService constructor.
     * @param TradeRepository $tradeRepository
     * @param CurrencyPairRepository $currencyPairRepository
     */
    public function __construct(TradeRepository $tradeRepository, CurrencyPairRepository $currencyPairRepository)
    {
        $this->tradeRepository = $tradeRepository;
        $this->currencyPairRepository = $currencyPairRepository;
    }

    /**
     * 一覧検索
     * @param string|null $fromDate 検索開始日
     * @param string|null $toDate 検索終了日
     * @return array
     */
    public function search(?string $fromDate, ?string $toDate) : array
    {
        return $this->tradeRepository->search($fromDate, $toDate);
    }

    /**
     * IDで取得
     * @param int $id
     * @return Trade
     */
    public function find(int $id) : Trade
    {
        return $this->tradeRepository->find($id);
    }

    /**
     * 通貨ペア一覧取得
     * @return array
     */
    public function getCurrencyPairs() : array
    {
        return $this->currencyPairRepository->findAll();
    }

    /**
     * 通貨ペア一覧取得
     * @param Trade $trade
     */
    public function save(Trade $trade)
    {
        if ($trade->getId()) {
            $this->tradeRepository->update($trade);
            Log::debug('##### updated. id=' . $trade->getId());
        } else {
            $newId = $this->tradeRepository->insert($trade);
            Log::debug('##### inserted. newId=' . $newId);
        }
    }

    /**
     * 削除
     * @param array $deleteIds
     */
    public function delete(array $deleteIds)
    {
        $this->tradeRepository->delete($deleteIds);
    }
}
