<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member = Transaction::with('members')->get();
        $notif = Transaction::where('status', '=', '2')->get();
       
        // return $transaction;
        return view('admin.transaction.index', compact('member', 'notif'));
    }

    public function api(Request $request)
    {
        
        if ($request->status) {
            $transaction = Transaction::where('status', $request->status)->get();
        } elseif($request->date_star) {
            $transaction = Transaction::where('date_star', $request->date_star)->get();
        } else {
            $transaction =Transaction::with('members')->get();
        }
        $datatable = DataTables::of($transaction)

            ->addColumn('namaPeminjam', function ($transaction) {
                return $transaction->members->nama;
            })

            ->addColumn('lamaPeminjam', function ($transaction) {
                $dateStar = new Carbon($transaction->date_star);
                $dateEnd = new Carbon($transaction->date_end);
                $diff = $dateStar->diff($dateEnd);
                return $diff->days. " Hari";
            })
            
            ->addColumn('totalBuku', function ($transaction) {
                return $transaction->transaction_details->count('qty');
                // $totalBuku = $transaction->transaction_details;
                // $total = [];
                // foreach ($totalBuku as $key => $value) {
                //     $total[] = [
                //         'qty' => $totalBuku[$key]->qty
                //     ];
                // }
                // return array_sum(array_column($total, 'qty'));
            })
            ->addColumn('totalBayar', function ($transaction) {
                foreach ($transaction->transaction_details as $td) {
                    $price = $td->books->price;
                    $qty = $td->qty;
                    $totalHarga[] = $price * $qty;
                }
                return array_sum($totalHarga);
            })
            ->addColumn('action', function ($transaction) {
                $url_detail = url('transaction/' . $transaction->id) ;
                $url_edit = url('transaction/' . $transaction->id . '/edit');

                $button = '<a href="'.$url_detail.'" class="btn btn-info btn-sm">Detail</a>' ;
                $button .= ' <a href="'.$url_edit.'" class="btn btn-warning btn-sm">Edit</a>';
                $button .= ' <form class="d-inline" action="'.$url_detail.'" method="POST">
                            <input type="hidden" name="_method" value="DELETE" >
                                <button type="submit" class="edit btn btn-danger btn-sm"
                                onclick="return confirm(\'Yakin ingin menghapus data ini?\')"
                                >Hapus</button>
                            ' . @csrf_field() . '
                     </form>';

                return $button;
            })
            ->addColumn('status', function ($transaction) {
                    $transactionStatus = $transaction->status == 1 ? '<span class="badge badge-success">Sudah Dikembalikan</span>' : '<span class="badge badge-danger">Belum Dikembalikan</span>';

                    return $transactionStatus;
            })
            ->rawColumns(['action', 'status'])
            ->addIndexColumn();

        // foreach ($transaction as  $trans) {
        //     $trans->date_star = FormatTanggalA($trans->date_star);
        //     $trans->date_end = FormatTanggalA($trans->date_end);
        //     $trans->status = $trans->status == 1 ? '<span class="badge badge-success">Success</span>
        //     ' : 'Belum Dikembalikan';
        // } //untuk membuat fungsi helpers

        return $datatable->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::all();
        $book = Book::where('qty', '!=', 0)->get();
        return view('admin.transaction.create', compact('member', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $transaction = Transaction::create($request->all());

        $book = $request->buku;
        $totalbuku = [];

        foreach ($book as $key => $value) {
            TransactionDetail::create([
                'transaction_id' => $transaction['id'],
                "book_id" => $book[$key],
                'qty' => 1
            ]);
            $totalbuku = Book::find($book[$key]);

            Book::where('id', '=', $book[$key])->update([
                'qty' =>  $totalbuku['qty'] - '1'
            ]);
        }

        return redirect('transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $member = Member::all();
        $book = Book::all();
        $transactionDetail = TransactionDetail::with('books')->get();
        $transactionDetails = $transaction->transaction_details()->pluck('book_id')->toArray();
        return view('admin.transaction.show', compact('transaction', 'member', 'book', 'transactionDetail', 'transactionDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $member = Member::all();
        $book = Book::where('qty', '!=', 0)->get();
        $transactionDetails = $transaction->transaction_details()->pluck('book_id')->toArray();
        return view('admin.transaction.edit', compact('transaction','member', 'book', 'transactionDetails'));
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
        $transaction->update($request->all());

        return redirect('transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('transaction');
    }
}
