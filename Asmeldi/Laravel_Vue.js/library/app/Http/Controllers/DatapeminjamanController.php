<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\books;
use App\Models\members;
use App\Models\transactionDetail;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class DatapeminjamanController extends Controller
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
        if (auth()->user()->role('petugas')) {
            $trans = transaction::get();

            $active = [];
            $nonActive = [];
            $DateStart = [];
            $DateEnd = [];
            foreach ($trans as $tran) {
                if ($tran->status == 1) {
                    $active[] = $tran->status;
                } else {
                    $nonActive[] = $tran->status;
                }
            }

            $active = count($active);
            $nonActive = count($nonActive);
            // return $DateStart;
            return view('Admin.Peminjaman.index', compact('trans', 'active', 'nonActive'));
        } else {
            return abort('403');
        }
    }
    public function api(Request $request)
    {
        if ($request->active == '0') {
            $datas = transaction::with('firstMembers')->where('status', '=', $request->active)->get();
        } elseif ($request->active == '1') {
            $datas = transaction::with('firstMembers')->where('status', '=', $request->active)->get();
        } elseif ($request->tanggals) {
            $datas = transaction::with('firstMembers')->where('date_start', '=', $request->tanggals)->get();
        } else {
            $datas = transaction::with('firstMembers')->get();
        }

        $dataTables = datatables()->of($datas)
            ->addColumn('nama_peminjam', function ($datas) {
                return $datas->firstMembers[0]->name;
            })
            ->addColumn('lama_peminjam', function ($datas) {
                $date_start =  $datas->date_start;
                $date_end =  $datas->date_end;

                $total_start = $date_start[8] . $date_start[9];
                $total_end = $date_end[8] . $date_end[9];

                $hari = $total_end - $total_start;
                return $hari . " Hari";
            })
            ->addColumn('total_buku', function ($datas) {
                $total_bukuu = $datas->transactiondetils;
                $total_buku = [];
                $total = [];
                foreach ($total_bukuu as $index => $unit) {
                    $total_buku[] = [
                        'qty' => $total_bukuu[$index]->qty
                    ];
                }
                return array_sum(array_column($total_buku, 'qty'));
            })
            ->addColumn('total_bayar', function ($datas) {
                // dd($datas->transactiondetils);
                foreach ($datas->transactiondetils as $tranDetail) {
                    $harga = $tranDetail->books->price;
                    $qty = $tranDetail->qty;
                    $totalbuku[] = $harga * $qty;
                }
                $totalHarga = array_sum($totalbuku);

                return $totalHarga;
            })
            ->addColumn('action', function ($datas) {
                return '
                        <a href="' . url('transanction/' . $datas->id . '/detail') . '" class="edit btn btn-primary btn-sm">Detail</a>
                        <a href="' . url('transanction/' . $datas->id . '/edit') . '" class="edit btn btn-success btn-sm">Edit</a>
                        <form action="' . url('transanction/' . $datas->id) . '" method="POST">
                     ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE" >
                    <button type="submit" class="edit btn btn-success btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >X</a>
                    </form>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn();

        return $dataTables->make(true);
    }
    public function apiEdit(Request $request)
    {
        dd('test');
        $datas = transaction::first();
        return $datas;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'id' => "",
            'editStatus' => 'false'
        ];
        $members = members::get();
        $books = books::where('qty', '!=', 0)->get();
        return view('Admin.Peminjaman.create', compact('data', 'members', 'books'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'member_id' => ['required', 'min:1', 'max:30'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'buku' => ['required', 'min:1', 'max:300'],
        ]);

        $transaction = [
            'member_id' => $validate['member_id'],
            'date_start' => $validate['date_start'],
            'date_end' => $validate['date_end'],
            'status' => 1
        ];

        $dataTrans = transaction::create($transaction);

        $buku = $request->buku;
        $total = [];
        foreach ($buku as $index => $unit) {
            $dataTransDetail = transactionDetail::create([
                'transaction_id' => $dataTrans['id'],
                "book_id" => $buku[$index],
                'qty' => 1
            ]);
            $total = books::find($buku[$index]);

            $updateBooks = books::where('id', '=', $buku[$index])->update([
                'qty' =>  $total['qty'] - '1'
            ]);
        }

        // dd($dataTransDetail, $updateBooks, $total['qty'],  'created');
        return redirect('transanction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $data = [
            'id' => $id,
            'editStatus' => 'true'
        ];

        $model = transaction::find($id);
        $books = books::where('qty', '!=', 0)->get();
        $id_member = members::where('id', $model->member_id)->first();
        $members = members::get();
        $trans = transaction::with('members', 'transactiondetils')->find($id);
        $details = transactionDetail::where('transaction_id', '=', $id)->with('transaction', 'books')->get();

        // return $details;
        return view('Admin.Peminjaman.view', compact('trans', 'details', 'books', 'data', 'members', 'id_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $data = [
            'id' => $id,
            'editStatus' => 'true'
        ];

        $model = transaction::find($id);
        $books = books::where('qty', '!=', 0)->get();
        $id_member = members::where('id', $model->member_id)->first();
        $members = members::get();
        $trans = transaction::with('members', 'transactiondetils')->find($id);
        $details = transactionDetail::where('transaction_id', '=', $id)->with('transaction', 'books')->get();


        // return $details;
        return view('Admin.Peminjaman.edit', compact('trans', 'details', 'books', 'data', 'members', 'id_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, transaction $transaction)
    {

        $data = [
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'buku' => $request->buku,
            'status' => $request->status
        ];
        $trans = [
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => '1'
        ];
        $datas = [];
        $status = $data['status'];
        if ($status == null) {
            $books = $data['buku'];
            if ($books == null) {
                $transaction = transaction::where('id',  $id)->update($trans);
            } else {
                $bukuu = $request->buku;

                foreach ($bukuu as $buku) {
                    $bookss[] = [
                        'ids' => $buku,
                    ];
                    $getbook[] = [
                        'id' => transactionDetail::where([
                            'transaction_id' => $id,
                            'book_id' => $buku
                        ])->get(),
                    ];
                    $datass = array_column($bookss, 'ids');
                    $datas = array_column($getbook, 'id');
                    $notNull = count($datas[0]);
                }
                $book_id = [];

                if ($notNull > 0) {
                    $datas = array_column($getbook, 'id');
                    foreach ($bukuu as $index => $unit) {
                        $idTrans = transactionDetail::where([
                            'transaction_id' => $id,
                            "book_id" => $bukuu[$index],
                        ])->first();

                        $dataTransDetail = transactionDetail::where([
                            'transaction_id' => $id,
                            "book_id" => $bukuu[$index],
                        ])->update([
                            'qty' => $idTrans['qty'] + 1
                        ]);
                        $total = books::find($bukuu[$index]);

                        $updateBooks = books::where('id', '=', $bukuu[$index])->update([
                            'qty' =>  $total['qty'] - '1'
                        ]);
                    }
                } else {
                    foreach ($bukuu as $index => $unit) {

                        $dataTransDetail = transactionDetail::create([
                            'transaction_id' => $id,
                            "book_id" => $bukuu[$index],
                            'qty' => 1
                        ]);
                        $total = books::find($bukuu[$index]);

                        $updateBooks = books::where('id', '=', $bukuu[$index])->update([
                            'qty' =>  $total['qty'] - '1'
                        ]);
                    }
                }
                $return = [
                    'detail' => $datas,

                ];
            }
        } else {

            $transactionActive = transactionDetail::where([
                'transaction_id' => $id,
            ])->with('books')->get();

            $getBook = [];
            $getQtyBook = [];
            $getQtyDetail = [];

            foreach ($transactionActive as $trans) {
                $getBook[] = $trans->books->id;
                $getQtyBook[] = $trans->books->qty;
                $getQtyDetail[] = $trans->qty;
            }
            foreach ($getBook as $index => $unit) {
                foreach ($getQtyBook as $index => $unit) {
                    foreach ($getQtyDetail as $index => $unit) {
                        books::where('id', '=', $getBook[$index])->update([
                            'qty' =>  $getQtyBook[$index] + $getQtyDetail[$index]
                        ]);
                    }
                }
            }


            $trans = [
                'status' => $request->status
            ];
            transaction::where('id', $id)->update($trans);
        }
        return redirect('transanction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, transaction $transaction)
    {
        $transaction->where('id', '=', $id)->delete();
        return redirect('transanction');
    }
}
