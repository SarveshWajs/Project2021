<?php

namespace App\Exports;

use App\Transaction;
use App\TransactionDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth, DB;

class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $start, $end;

	 function __construct($start, $end, $item_code, $product_code) {
      $this->start = $start;
      $this->end = $end;
      $this->item_code = $item_code;
      $this->product_code = $product_code;
  }


    public function view(): View
    {
    	$transactions = Transaction::select(DB::raw('CASE 
                                                     WHEN m.id != "" THEN COALESCE(m.f_name, m.phone)
                                                     WHEN a.id != "" THEN COALESCE(a.f_name, a.phone)
                                                     WHEN u.id != "" THEN COALESCE(u.f_name, u.phone)
                                                 END AS buyer_name'),
                                        DB::raw('CASE 
                                                     WHEN m.id != "" THEN "Agent"
                                                     WHEN a.id != "" THEN "Admin"
                                                     WHEN u.id != "" THEN "Customer"
                                                 END AS buyer_role'),'d.item_code', 'd.product_code',
                                        'transactions.transaction_no', 'transactions.status', 'transactions.created_at',
                                        'transactions.id AS Tid', 'transactions.grand_total', 'transactions.shipping_fee', 'transactions.processing_fee', 'transactions.discount', 'transactions.address_name',
                                        'transactions.rebate_amount', 'mall', 'online_payment_method')
                               ->leftJoin('merchants AS m', 'm.code', 'transactions.user_id')
                               ->leftJoin('admins AS a', 'a.code', 'transactions.user_id')
                               ->leftJoin('users AS u', 'u.code', 'transactions.user_id')
                               ->join('transaction_details AS d', 'd.transaction_id', 'transactions.id')
                               ->where('transactions.status', '1')
                               ->whereNull('transactions.mall')
                               ->whereBetween(DB::raw('DATE_FORMAT(transactions.created_at, "%Y-%m-%d")'), array($this->start, $this->end))
                               ->orderBy('transactions.created_at', 'desc');

        $totalT = Transaction::select(DB::raw('SUM(d.quantity) as totalQty'),
                                      DB::raw('SUM(d.unit_price) as totalUnitPrice'),
                                      DB::raw('SUM(d.unit_price * d.quantity) as totalNet'),
                                      DB::raw('SUM((d.unit_price * d.quantity) + transactions.processing_fee + transactions.shipping_fee + transactions.tax) as totalGrand'))
                                   ->join('transaction_details AS d', 'd.transaction_id', 'transactions.id')
                                   ->where('transactions.status', '1')
                                   ->whereNull('transactions.mall')
                                   ->whereBetween(DB::raw('DATE_FORMAT(transactions.created_at, "%Y-%m-%d")'), array($this->start, $this->end))
                                   ->orderBy('transactions.created_at', 'desc');

        $totalT2 = Transaction::select(DB::raw('SUM(transactions.processing_fee) as totalProcessingFee'),
                                      DB::raw('SUM(transactions.shipping_fee) as totalShippingFee'),
                                      DB::raw('SUM(transactions.tax) as totalTax'),
                                      DB::raw('SUM(transactions.discount) as totalDiscount'),
                                      DB::raw('SUM(transactions.rebate_amount) as totalRebate'))
                              ->where('transactions.status', '1')
                              ->whereNull('transactions.mall')
                              ->whereBetween(DB::raw('DATE_FORMAT(transactions.created_at, "%Y-%m-%d")'), array($this->start, $this->end))
                              ->orderBy('transactions.created_at', 'desc');
if(!empty($this->item_code)){
            $transactions = $transactions->where('d.item_code', $this->item_code);
        }

        if(!empty($this->product_code)){
            $transactions = $transactions->where('d.product_code', $this->product_code);
        }
        $transactions = $transactions->get();
        $totalT = $totalT->first();
        $totalT2 = $totalT2->first();

        $details = [];
        $details2 = [];
        foreach($transactions as $transaction){
            $details[$transaction->Tid] = TransactionDetail::where("transaction_id", $transaction->Tid)->get();   
            $details2[$transaction->Tid] = TransactionDetail::select(DB::raw('SUM(unit_price*quantity) AS totalPrice'))
                                                            ->where("transaction_id", $transaction->Tid)
                                                            ->first();
        }

        return view('backend.reports.download_order_report', ['transactions'=>$transactions, 'start'=>$this->start, 'end'=>$this->end,
                                                              'totalT'=>$totalT, 'totalT2'=>$totalT2],
                                                              compact('details', 'details2'));

    }

    
}
