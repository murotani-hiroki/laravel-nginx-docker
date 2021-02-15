<?php


namespace App\Http\Controllers;


use App\Http\Requests\SaveRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Trade;
use App\Service\FxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FxController extends Controller
{
    /** @var FxService */
    private $fxService;

    /**
     * FxController constructor.
     * @param FxService $fxService
     */
    public function __construct(FxService $fxService)
    {
        $this->fxService = $fxService;
    }

    /**
     * 検索
     * @param SearchRequest $request
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request) {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        //Log::debug($fromDate);
        //Log::debug($toDate);

        $trades = $this->fxService->search($fromDate, $toDate);
        return view('trade_list', ['trades' => $trades]);
    }


    /**
     * モーダル新規表示
     * @return \Illuminate\View\View
     */
    public function newModal() {

        $currencyPairs = $this->fxService->getCurrencyPairs();

        return view('modal', ['currencyPairs' => $currencyPairs,
                                    'trade' => Trade::create()]);
    }

    /**
     * モーダル編集表示
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editModal(Request $request) {

        $currencyPairs = $this->fxService->getCurrencyPairs();
        $trade = $this->fxService->find($request->input('id'));

        return view('modal', ['currencyPairs' => $currencyPairs,
                                    'trade' => $trade]);
    }


    /**
     * モーダル Save
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function save(SaveRequest $request) {

        $trade = Trade::create()
            ->setId($request->input('id'))
            ->setTradingDate($request->input('tradingDate'))
            ->setSettlementDate($request->input('settlementDate'))
            ->setCurrencyPairId($request->input('currencyPairId'))
            ->setTradeType($request->input('tradeType'))
            ->setQuantity($request->input('quantity'))
            ->setEntryPrice($request->input('entryPrice'))
            ->setExitPrice($request->input('exitPrice'))
            ->setStopLoss($request->input('stopLoss'))
            ->setProfit($request->input('profit'))
            ->setComment($request->input('comment'));

        //Log::debug(print_r($trade, true));

        $this->fxService->save($trade);

        return ['message' => '登録しました。'];
    }

    /**
     * 削除
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function delete(Request $request) {
        $deleteIds = $request->input('deleteIds');
        //Log::debug(print_r($deleteIds, true));
        if ($deleteIds) {
            $this->fxService->delete($deleteIds);
            return ['message' => '削除しました。'];
        }
        return null;
    }
}

