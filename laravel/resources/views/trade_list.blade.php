    <table id="trade-list">
        <th></th>
        <th>取引日</th>
        <th>決済日</th>
        <th>通貨ペア</th>
        <th>Ask/Bid</th>
        <th>数量</th>
        <th>Entry</th>
        <th>Exit</th>
        <th>S/L</th>
        <th>損益</th>
        <th><input type="checkbox" id="selectAll"></th>
        @foreach ($trades as $trade)
        <tr>
            <td><a href="#" class="tradeId">{{$trade->getId()}}</a></td>
            <td>{{$trade->getTradingDate()}}</td>
            <td>{{$trade->getSettlementDate()}}</td>
            <td>{{$trade->getCurrencyPair()}}</td>
            <td>{{$trade->getTradeType()}}</td>
            <td>{{$trade->getQuantity()}}</td>
            <td>{{$trade->getEntryPrice()}}</td>
            <td>{{$trade->getExitPrice()}}</td>
            <td>{{$trade->getStopLoss()}}</td>
            <td><span class="profit">{{$trade->getProfit()}}</span></td>
            <td><input type="checkbox" class="deleteId" value="{{$trade->getId()}}"></td>
        </tr>
        @endforeach
    </table>
