<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Support\Facades\DB;
use App\Models\Members;
use App\Models\Catalog;

use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //no1
        $data1 = Members::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();

        //no2
        $data2 = Members::select('*')
            ->leftJoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', NULL)
            ->get();
        //no3
        $data3 = transaction::select('members.id', 'members.name')
            ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
            ->where('transactions.member_id', NULL)
            ->get();
        //no4
        $data4 = Members::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('members.id', 'asc')
            ->get();
        //no5
        $data5 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('transactions.member_id', '>', 1)
            ->get();
        //no6
        $month = '06';
        $data6 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->get();
        //no7
        $month = '06';
        $data7 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereMonth('transactions.date_end', '=', $month)
            ->get();
        //no8
        $month = '05';
        $data8 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereMonth('transactions.date_start', '=', $month)
            ->get();
        //no9
        $month = '06';
        $data9 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereMonth('transactions.date_start', '=', $month)
            ->whereMonth('transactions.date_start', '=', $month)
            ->get();
        //no10
        $data10 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.adress', '=', 'Bandung')
            ->get();
        //no11
        $data11 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress', 'members.gender',  'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.adress', '=', 'Bandung')
            ->where('members.gender', '=', 'P')
            ->get();
        //no12
        $data12 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress', 'members.gender',  'transactions.date_start', 'transaction_details.qty')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->where('transaction_details.qty', '>', '1')
            ->get();

        //no13
        $count = DB::raw('transaction_details.qty * books.price as total_price');
        $data13 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress', 'members.gender',  'transactions.date_start', 'transactions.date_end', 'transaction_details.qty as qty_trans', 'books.id as id_book', 'books.title', 'books.price as harga_pinjam', $count)
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->get();
        //no14
        $data14 = Members::select('members.id', 'members.name', 'members.phone_number', 'members.adress', 'members.gender',  'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.title',  'catalogs.name as name_penerbit', 'authors.name as name_pengarang', 'catalogs.name as name_catalog')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->get();
        //no15
        $data15 = books::select('catalogs.id as id_catalog', 'catalogs.name as Name_catalog', 'books.title as judul')
            ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
            ->get();
        //no16
        $data16 = books::select('books.*')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->get();

        return $data16;
        return view('home');
    }
}
