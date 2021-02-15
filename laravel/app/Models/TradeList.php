<?php


namespace App\Models;


class TradeList
{
    /** @var int ID */
    private $id;

    /** @var string 取引日 */
    private $tradingDate;

    /** @var string 決済日 */
    private $settlementDate;

    /** @var string 通貨ペア */
    private $currencyPair;

    /** @var int Ask/Bid */
    private $tradeType;

    /** @var int 数量 */
    private $quantity;

    /** @var float Entry価格 */
    private $entryPrice;

    /** @var float Exit価格 */
    private $exitPrice;

    /** @var int ストップロス */
    private $stopLoss;

    /** @var float 損益 */
    private $profit;

    /** @var string コメント */
    private $comment;

    /**
     * TradeList constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->tradingDate = $data->trading_date;
        $this->settlementDate = $data->settlement_date;
        $this->currencyPair = $data->currency_pair;
        $this->tradeType = $data->trade_type;
        $this->quantity = $data->quantity;
        $this->entryPrice = $data->entry_price;
        $this->exitPrice = $data->exit_price;
        $this->stopLoss = $data->stop_loss;
        $this->profit = $data->profit;
        $this->comment = $data->comment;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTradingDate(): ?string
    {
        return date('Y/m/d', strtotime($this->tradingDate));
    }

    /**
     * @return string
     */
    public function getSettlementDate(): ?string
    {
        return date('Y/m/d',strtotime($this->settlementDate));
    }

    /**
     * @return string
     */
    public function getCurrencyPair(): ?string
    {
        return $this->currencyPair;
    }

    /**
     * @return int
     */
    public function getTradeType(): ?string
    {
        if ($this->tradeType == null) {
            return null;
        };

        return $this->tradeType == 1 ? 'Ask' : 'Bid';
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getEntryPrice(): ?float
    {
        return $this->entryPrice;
    }

    /**
     * @return float
     */
    public function getExitPrice(): ?float
    {
        return $this->exitPrice;
    }

    /**
     * @return int
     */
    public function getStopLoss(): ?int
    {
        return $this->stopLoss;
    }

    /**
     * @return float
     */
    public function getProfit(): ?float
    {
        return $this->profit;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

}
