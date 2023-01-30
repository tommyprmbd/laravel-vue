<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Books;
use App\Models\Members;
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
        $datatables = datatables()->of($transactions)->addIndexColumn();

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

        transaction::create($request->all());

        return redirect('transactions');
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