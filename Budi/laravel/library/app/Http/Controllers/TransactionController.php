<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;
use App\Models\Member;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        if (auth()->user()->role('petugas')) {
            $dataT = Transaction::get();
            $members = Member::get();

            return view('admin.transaction.index', compact('dataT', 'members'));
        } else {
            return abort('403');
        }

        // $dataT = Transaction::get();

        //     return view('admin.transaction.index', compact('dataT'));

    }
    public function api(Request $request)
    {
        if ($request->status) {
            $dataT = Transaction::where('status', $request->status)->orderBy('id', 'desc')->get();
        } else if ($request->tanggal){
            $dataT = Transaction::where('date_start', $request->tanggal)->orderBy('id', 'desc')->get();
        } else {
            $dataT = Transaction::orderBy('id', 'desc')->get();
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
                return $dataT->TransactionDetail->sum('qty');
                
            })
            ->addColumn('total_bayar', function($dataT){
                $grandTotal = 0;
                foreach ($dataT->TransactionDetail as $tranDetail) {
                    $HargaBuku = $tranDetail->Book->price;
                    $qty = $tranDetail->qty;
                    $grandTotal = $HargaBuku * $qty;
                }
                return $grandTotal;
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
        $data = [
            'id' => "",
            'editStatus' => 'false'
        ];
        $members = member::get();
        $books = Book::where('qty', '!=', 0)->get();
        return view('admin.transaction.create', compact('data', 'members', 'books'));
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
            'buku' => ['required','array'],
            'buku.*' => ['required','int','min:1']
        ]);

        $data = [
            'member_id' => $request->get('member_id'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
            'status' => 'belum'
        ];

        DB::beginTransaction();
        try {
            $transaction = Transaction::create($data);

            $books = $request->get('buku');
            foreach ($books as $book) {
                $dtl = TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id' => $book,
                    'qty' => 1
                ]);

                if ($dtl) {
                    $bookObj = Book::find($book);
                    $bookObj->qty -= 1;
                    $bookObj->save();
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        // transaction::create($request->all());

        // $dataTrans = transaction::create($transaction);
        // $bukuB = $request->bukuB;
        // $total = [];
        // foreach ($bukuB as $index => $unit) {
        //     $TransDetail = transactionDetail::create([
        //         'transaction_id' => $dataTrans['id'],
        //         "book_id" => $bukuB[$index],
        //         'qty' => 1
        //     ]);

        //     $total = Book::find($bukuB[$index]);
        //     $updateBooks = Book::where('id', '=', $bukuB[$index])->update([
        //         'qty' =>  $total['qty'] - '1'
        //     ]);

        // }
        return redirect()->route('transactions.index');
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
        $members = member::get();
        $books = Book::where('qty', '!=', 0)->get();
        return view('admin.transaction.edit', compact('transaction','members','books'));
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
        $this->validate($request,[
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'buku' => ['required','array'],
            'buku.*' => ['required','int','min:1']
        ]);

        DB::beginTransaction();
        try {
            $transaction->member_id = $request->get('member_id');
            $transaction->date_start = $request->get('date_start');
            $transaction->date_end = $request->get('date_end');
            $transaction->status = $request->get('status');
            $transaction->update();

            $current = TransactionDetail::where('transaction_id','=',$transaction->id)->get();
            $books = $request->get('buku');

            foreach ($current as $tranDtl) {
                if (!in_array($tranDtl->book_id, $books)) {
                    $bookId = $tranDtl->book_id;
                    $delete = $tranDtl->delete();

                    if ($delete) {
                        $bookObj = Book::find($bookId);
                        $bookObj->qty += 1;
                        $bookObj->save();
                    }
                }
            }

            $currentBook = TransactionDetail::where('transaction_id','=',$transaction->id)->pluck('book_id')->toArray();
            foreach ($books as $book) {
                if (!in_array($book, $currentBook)) {
                    $dtl = TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'book_id' => $book,
                        'qty' => 1
                    ]);

                    if ($dtl) {
                        $bookObj = Book::find($book);
                        $bookObj->qty -= 1;
                        $bookObj->save();
                    }
                }
            }

        } catch (\Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        // $this->validate($request,[
        //     'name' => ['required'],
        //     'email' => ['required'],
        //     'phone_number' => ['required'],
        //     'address' => ['required'],
        // ]);

        // $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        DB::beginTransaction();
        try {
            foreach ($transaction->TransactionDetail as $dtl) {
                $dtl->delete();
            }
            $transaction->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        DB::commit();
    }

    public function test_spatie()
    {
        // $role = Role::create(['name' => 'petugas']);
        // $permission = permission::create(['name' => 'index transaction']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = User::where('id',2)->first();

        // $user = auth()->user();
        // $user->assignRole('petugas');
        // return $user;    

        // $user = auth()->user();
        // $user = User::with('roles')->get();
        // return $user;

        // $user = auth()->user();
        // $user->removeRole('petugas');

    }
}