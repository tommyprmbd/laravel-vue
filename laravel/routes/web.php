<?php

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $model = Transaction::all();
    return DataTables::of($model)
        ->addColumn('nama_peminjam', fn ($model) => $model->anggota->nama)
        ->addColumn('lama_pinjam', function ($model) {
            // function lamaPinjam bisa dicek di model Transaction dgn nama getLamaPinjamAttribute
            return $model->lamaPinjam;
        })
        ->addColumn('total_bayar', function ($model) {
            /**
             * 1. dapatkan data transaction detail
             */
            $transactionDetail = $model->transactionDetails;
            $totalBayar = 0;
            if (count($transactionDetail) > 0) {
                foreach ($transactionDetail as $key => $item) {
                    $hargaPinjam = $item->book->harga_pinjam;
                    $lamaPinjam = $model->lamaPinjam;
                    $qty = $item->qty;
                    $totalBayar += $hargaPinjam * $lamaPinjam * $qty;
                }
            }
            return $totalBayar;
        })
        ->make(true);
});
