<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tradingDate' => 'bail|required|date',
            'settlementDate' => 'nullable|date',
            'currencyPairId' => 'required',
            'tradeType' => 'required',
            'quantity' => 'bail|required|integer',
            'entryPrice' => 'bail|required|numeric',
            'exitPrice' => 'nullable|numeric',
            'stopLoss' => 'nullable|integer',
            'profit' => 'nullable|numeric',
        ];
    }
}
