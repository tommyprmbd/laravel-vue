<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Member;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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
        $dataT = Transaction::get();
        return view('admin.transaction.index', compact('dataT'));
    }

    public function api(Request $request)
    {
        if ($request->status) {
            $dataT = Transaction::where('status', $request->status)->get();
        } else {
            $dataT = Transaction::all();
        }        
        
        if ($request->tanggal) {
            $dataT = Transaction::where('date_start', $request->tanggals)->get();
        } else {
            $dataT = Transaction::all();
        }

        // yajra data table
        $datatables = datatables()->
            of($dataT)
            ->addColumn('nama_peminjam', function($dataT){
                return $dataT->member->name;
            })
            ->addColumn('lama_minjam', function($dataT){
                $date_start =  $dataT->date_start;
                $date_end =  $dataT->date_end;
                $total_dstart = $date_start[8] . $date_start[9];
                $total_dend = $date_end[8] . $date_end[9];

                $hari = $total_dend - $total_dstart;
                return $hari . " Hari";
            })
            ->addColumn('total_buku', function($dataT){
                $total_bukuA = $dataT->TransactionDetail;
                $total_bukuB = [];
                $total = [];
                foreach ($total_bukuB as $index => $unit) {
                    $total_bukuA[] = [
                        'qty' => $total_bukuB[$index]->qty
                    ];
                }
                return array_sum(array_column($total_bukuB, 'qty'));
                
            })
            ->addColumn('total_bayar', function($dataT){
                $grandTotal = [];
                dd($dataT->TransactionsDetail);
                foreach ($dataT->TransactionsDetail as $tranDetail) {
                    $HargaBuku = $tranDetail->Book->price;
                    $qty = $tranDetail->qty;
                    $total = $harga * $qty;
                }
                $grandTotal = array_sum($total);

                return array_sum($grandTotal);
                // return 'total';
            })
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
        $this->validate($request,[
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'status' => ['required'],
        ]);

        $transaction = [
            'member_id' => $validate['member_id'],
            'date_start' => $validate['date_start'],
            'date_end' => $validate['date_end'],
            'status' => 1
        ];

        // transaction::create($request->all());

        $dataTrans = transaction::create($transaction);
        $bukuB = $request->bukuB;
        $total = [];
        foreach ($bukuB as $index => $unit) {
            $TransDetail = transactionDetail::create([
                'transaction_id' => $dataTrans['id'],
                "book_id" => $bukuB[$index],
                'qty' => 1
            ]);

            $total = Book::find($bukuB[$index]);
            $updateBooks = Book::where('id', '=', $bukuB[$index])->update([
                'qty' =>  $total['qty'] - '1'
            ]);

        return redirect('transactions');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
        // $this->validate($request,[
        //     'name' => ['required'],
        //     'email' => ['required'],
        //     'phone_number' => ['required'],
        //     'address' => ['required'],
        // ]);

        // $transaction->update($request->all());

        // return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        // $transaction->delete();
    }
}