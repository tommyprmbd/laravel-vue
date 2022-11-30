<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Member;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $members = Member::with('user')->get();
        // $publisher = Publisher::with('books')->get();
        // $catalog = Catalog::with('books')->get();
        // $author = Author::with('books')->get();
        // $book = Book::with('author')->get();
        // $book = Book::with('catalog')->get();
        // $book = Book::with('publisher')->get();

        // return $book;
        // return $author;
        // return $catalog;
        // return $publisher;
        // return $members;


        // QUERY BUILDER
        $data1 = DB::table('members')
                    ->join('users', 'members.id', '=', 'users.member_id')
                    ->get();

        
        $data2 = DB::table('members')
        ->leftjoin('users', 'members.id', '=', 'users.member_id')
        ->where('users.id', NULL)
        ->get();

        $data3 = Transaction::select('members.id', 'members.nama')
                ->rightjoin('members', 'members.id', '=', 'transactions.member_id')
                ->where('transactions.member_id', '=', NULL)
                ->get();

        $data4 = DB::table('members')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.id', 'members.nama', 'members.phone')
                    ->orderBy('transactions.member_id')
                    ->get();

        $data5 = DB::table('members')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.id', 'members.nama', 'members.phone')
                    ->where('transactions.member_id', '>', 1)
                    ->get();
                    
        $data6 = DB::table('members')
                    ->leftjoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->get();

        $data7 = DB::table('members')
                    ->leftjoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->whereMonth('transactions.date_end', '6')
                    ->get();

        $data8 = DB::table('members')
                    ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->whereMonth('transactions.date_end', '5')
                    ->get();
                    
        $data9 = DB::table('members')
                    ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->whereMonth('transactions.date_star', '6')
                    ->whereMonth('transactions.date_end', '6')
                    ->get();

        $data10 = DB::table('members')
                    ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->where('members.address', 'like', '%suite%')
                    ->get();

        $data11 = DB::table('members')
                    ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end')
                    ->where('members.address', 'like', '%suite%')
                    ->where('members.gender', '=', 'p')
                    ->get();

        $data12 = DB::table('members')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end', 'transaction_details.id', 'transaction_details.qty')
                    ->where('qty', '>', 1)
                    ->get();

        // $totalHarga = DB::raw('transaction_details.qty * books.price as total_price');
        // jika dipanggil menggunakan variabel gunakan cara diatas
        $data13 = DB::table('members')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end', 'transaction_details.id', 'transaction_details.qty', 'books.price', DB::raw('transaction_details.qty * books.price as totalHarga'))
                    ->get();

        $data14 = DB::table('members')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('books', 'books.id', '=', 'transaction_details.book_id')
                    ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->join('authors', 'authors.id', '=', 'books.author_id')
                    ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                    ->select('members.nama', 'members.phone', 'members.address', 'transactions.date_star', 'transactions.date_end', 'transaction_details.id', 'transaction_details.qty', 'books.title', 'publishers.nama as publisher_nama', 'authors.nama as author_nama', 'catalogs.nama as catalog_nama')
                    ->get();

        $data15 = DB::table('catalogs')
                    ->join('books', 'books.catalog_id', '=', 'catalogs.id')
                    ->select('catalogs.*', 'books.title')
                    ->get();

        $data16 = DB::table('books')
                    ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->select('books.*', 'publishers.nama')
                    ->get();

        $data17 = DB::table('books')
                    ->select(DB::raw('SUM(author_id = 1) as total_author_id_1'))
                    ->get();

        $data18 = DB::table('books')
                    ->select('price')
                    ->where('price', '>', '10000')
                    ->get();

        $data19 = DB::table('books')
                    ->select('*')
                    ->where('publisher_id', '=', '1')
                    ->where('qty', '>', '10')
                    ->get();

        $data20 = DB::table('members')
                    ->select('*')
                    ->whereMonth('created_at', '06')
                    ->get();


        return $data20;
        return view('home');
    }
}
