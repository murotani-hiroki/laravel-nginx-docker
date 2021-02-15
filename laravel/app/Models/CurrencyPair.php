<?php


namespace App\Models;


class CurrencyPair
{
    /** @var int ID */
    private $id;

    /** @var string 通貨ペア */
    private $currencyPair;

    /**
     * CurrencyPair constructor.
     */
    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->currencyPair = $data->currency_pair;
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
    public function getCurrencyPair(): string
    {
        return $this->currencyPair;
    }
}
