<div id="modalContainer">
    <div class="modal">
        <div><div class="label1">ID</div><span id="tradeId">{{$trade->getId()}}</span></div>
        <div><div class="label1">取引日</div><input type="text" id="tradingDate" value="{{$trade->getTradingDate()}}"></div>
        <div><div class="label1">決済日</div><input type="text" id="settlementDate" value="{{$trade->getSettlementDate()}}"></div>
        <div>
            <div class="label1">通貨ペア</div>
            <select id="currencyPair">
                @foreach ($currencyPairs as $currencyPair)
                <option value="{{$currencyPair->getId()}}" {{$currencyPair->getId() == $trade->getCurrencyPairId() ? 'selected' : ''}}>
                    {{$currencyPair->getCurrencyPair()}}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <div class="label1">ask/bid</div>
            <input type="radio" name="tradeType" value="1" {{$trade->getTradeType() == 1 ? 'checked="checked"' : ''}}>ask
            <input type="radio" name="tradeType" value="2" {{$trade->getTradeType() == 2 ? 'checked="checked"' : ''}}>bid
        </div>
        <div><div class="label1">数量</div><input type="text" id="quantity" value="{{$trade->getQuantity()}}"></div>
        <div><div class="label1">Entry</div><input type="text" id="entryPrice" value="{{$trade->getEntryPrice()}}"></div>
        <div><div class="label1">Exit</div><input type="text" id="exitPrice" value="{{$trade->getExitPrice()}}"></div>
        <div><div class="label1">S/L(pips)</div><input type="text" id="stopLoss" value="{{$trade->getStopLoss()}}"></div>
        <div><div class="label1">損益</div><input type="text" id="profit" value="{{$trade->getProfit()}}"></div>
        <div><div class="label1">コメント</div><textarea cols=60 rows=10 id="comment">{{$trade->getComment()}}</textarea></div>
        <div>
            <div class="label1">画像</div><input type="text" id="img"><button id="addImageBtn">＋</button>
        </div>
        <div style="margin-top: 10px"><button id="saveBtn">save</button></div>
    </div>
    <div class="overlay"></div>
</div>
