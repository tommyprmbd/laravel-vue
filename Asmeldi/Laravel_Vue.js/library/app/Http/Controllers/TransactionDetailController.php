<?php

namespace App\Http\Controllers;

use App\Models\transactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
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
        //
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
     * @param  \App\Models\transactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(transactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(transactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(transactionDetail $transactionDetail)
    {
        //
    }
}
