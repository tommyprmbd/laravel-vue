<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('member','transaction_detail')->join('transaction_details','transaction_details.transaction_id','=','transactions.id')->join('books','books.id','=','transaction_details.book_id')->get();
        
        return view('admin.transaction.index', compact('transactions'));
    }

    public function api()
    {
        $transactions = Transaction::all();
        $datatables = datatables()->of($transactions)
                            ->addColumn('borrow_date', function($transaction) {
                                return convert_date($transaction->date_start);
                            })->addColumn('return_date', function($transaction) {
                                return convert_date($transaction->date_end);
                            })->addColumn('borrower_name', function($transaction) {
                                return $transaction->member['name'];
                            })->addColumn('long_term', function($transaction) {
                                return subtract_date($transaction->date_start,$transaction->date_end);
                            })->addColumn('book_total', function($transaction) {
                                return $transaction->transaction_detail['qty'];
                            })
                            // ->addColumn('price_total', function($transaction) {
                            //     $transactionDetail = $transaction->transaction_details;
                            //     $priceTotal = 0;
                            //     foreach ($transactionDetail as $key => $item) {
                            //         $borrowPrice = $item->books->price;
                            //         $longTerm = subtract_date($transaction->date_start,$transaction->date_end);
                            //         $qty = $item->qty;
                            //         $priceTotal += $borrowPrice * $longTerm * $qty;
                            //     }
                            //     return $priceTotal;
                            // })
                            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
