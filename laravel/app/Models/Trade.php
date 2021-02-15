<?php


namespace App\Models;


class Trade
{
    /** @var int ID */
    private $id;

    /** @var string 取引日 */
    private $tradingDate;

    /** @var string 決済日 */
    private $settlementDate;

    /** @var int 通貨ペアID */
    private $currencyPairId;

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
     */
    private function __construct()
    {
    }

    /**
     * @return static
     */
    public static function create() : self
    {
        return new self();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Trade
     */
    public function setId(?int $id) : self
    {
        $this->id = $id;
        return $this;

    }

    /**
     * @return string|null
     */
    public function getTradingDate(): ?string
    {
        if ($this->tradingDate) {
            return date('Y/m/d',strtotime($this->tradingDate));
        }
        return null;
    }

    /**
     * @param string|null $tradingDate
     * @return Trade
     */
    public function setTradingDate(?string $tradingDate) : self
    {
        $this->tradingDate = $tradingDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSettlementDate(): ?string
    {
        if ($this->settlementDate) {
            return date('Y/m/d',strtotime($this->settlementDate));
        }
        return null;
    }

    /**
     * @param string|null $settlementDate
     * @return Trade
     */
    public function setSettlementDate(?string $settlementDate) : self
    {
        $this->settlementDate = $settlementDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrencyPairId(): ?int
    {
        return $this->currencyPairId;
    }

    /**
     * @param int|null $currencyPairId
     * @return Trade
     */
    public function setCurrencyPairId(?int $currencyPairId) : self
    {
        $this->currencyPairId = $currencyPairId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTradeType(): ?int
    {
        return $this->tradeType;
    }

    /**
     * @param int|null $tradeType
     * @return Trade
     */
    public function setTradeType(?int $tradeType) : self
    {
        $this->tradeType = $tradeType;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Trade
     */
    public function setQuantity(?int $quantity) : self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getEntryPrice(): ?float
    {
        return $this->entryPrice;
    }

    /**
     * @param float|null $entryPrice
     * @return Trade
     */
    public function setEntryPrice(?float $entryPrice) : self
    {
        $this->entryPrice = $entryPrice;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getExitPrice(): ?float
    {
        return $this->exitPrice;
    }

    /**
     * @param float|null $exitPrice
     * @return Trade
     */
    public function setExitPrice(?float $exitPrice) : self
    {
        $this->exitPrice = $exitPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStopLoss(): ?int
    {
        return $this->stopLoss;
    }

    /**
     * @param int|null $stopLoss
     * @return Trade
     */
    public function setStopLoss(?int $stopLoss) : self
    {
        $this->stopLoss = $stopLoss;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getProfit(): ?float
    {
        return $this->profit;
    }

    /**
     * @param float|null $profit
     * @return Trade
     */
    public function setProfit(?float $profit) : self
    {
        $this->profit = $profit;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return Trade
     */
    public function setComment(?string $comment) : self
    {
        $this->comment = $comment;
        return $this;
    }



}
