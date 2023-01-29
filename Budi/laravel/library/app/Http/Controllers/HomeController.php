<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
// use App\Models\Author;
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
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(books.publisher_id) as total"))->groupBy('books.publisher_id')->orderBy('books.publisher_id','asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id','asc')->join('books','books.publisher_id','=','publishers.id')->groupBy('publishers.name')->pluck('publishers.name');

        // $data_pie = Book::select(DB::raw("COUNT(books.author_id) as total"))->groupBy('books.author_id')->orderBy('books.author_id','asc')->pluck('total');
        // $label_pie = author::orderBy('authors.id','asc')->join('books','books.author_id','=','authors.id')->groupBy('authors.name')->pluck('authors.name');

        $label_bar = ['Transaction.date_start', 'Transaction.date_end'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
        $data_bar[$key]['label'] = $label_bar[$key];
        $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0,9)' : 'rgba(210, 214, 222, 1)';
        $data_month = [];

        foreach (range(1,12) as $month) {
            if ($key == 0) {
                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
            } else {
                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
            }
        }
            
            $data_bar[$key]['data'] = $data_month;
        }
        // return $data_pie;
       return view('home', compact('total_member', 'total_book', 'total_transaction', 'total_publisher', 'data_donut', 'label_donut', 'data_bar'));
    }
}



        //$members = Member::with('user')->get();
        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('books')->get();

        // // no 1
        // $data1 = Member::select('*')
        //         ->join('users','users.member_id','=','members.id')
        //         ->get();

        // // no 2
        // $data2 = Member::select('*')
        //         ->leftJoin('users','users.member_id','=','members.id')
        //         ->where('users.id',NULL)
        //         ->get();

        // // no 3
        // $data3 = Transaction::select('members.id','members.name')
        //         ->rightJoin('members','members.id','=','transactions.member_id')
        //         ->where('transactions.member_id', NULL)
        //         ->get();

        // // no 4
        // $data4 = Member::select('members.id','members.name','members.phone_number')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->orderBy('members.id','asc')
        //         ->get();

        // // no 5
        // $data5 = DB::table('members')
        //         ->select(DB::raw("members.id,members.name,members.phone_number,count(*) as transaksi"))
        //         ->join('transactions','members.id','=','transactions.member_id')
        //         ->groupBy('members.id','members.name','members.phone_number')
        //         ->having(DB::raw('count(transaksi)'),'>',1)
        //         ->get();

        // // no 6
        // $data6 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->get();

        // // no 7
        // $data7 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->where(DB::raw("MONTH(transactions.date_end)=6"))
        //         ->get();

        // // no 8
        // $data8 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->where(DB::raw("MONTH(transactions.date_start)=5"))
        //         ->get();

        // // no 9
        // $data9 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->where(DB::raw("MONTH(transactions.date_start)=6"),'AND',("MONTH(transactions.date_end)=6"))
        //         ->get();

        // // no 10
        // $data10 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->join('transactions','transactions.member_id','=','members.id')
        //         ->where('members.address','LIKE','%'.'bandung'.'%')
        //         ->get();

         //no 11
        //$data11 = Member::select('members.name','members.gender','members.phone_number','members.address','transactions.date_start','transactions.date_end')
               // ->join('transactions','transactions.member_id','=','members.id')
               // ->where('members.address','LIKE','%'.'bandung'.'%','AND','members.gender','LIKE','%'.'P'.'%')
                //->get();

        // no 12
       // $data12 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.isbn','transaction_details.qty')
            //->join('transactions','transactions.member_id','=','members.id')
            //->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
            //->where('transaction_details.qty','>',1)
           // ->get();

        // no 13
        //$data13 = DB::table('members')
               // ->select(DB::raw("members.name,members.phone_number,members.address,transactions.date_start,transactions.date_end,transaction_details.isbn,books.title,books.qty,books.price,(books.qty*books.price) as total_price"))
               // ->join('transactions','transactions.member_id','=','members.id')
               // ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
               // ->join('books','transaction_details.isbn','=','books.isbn')
               // ->get();

        //no 14
        //$data14 = DB::table('members')
                //->select(DB::raw("members.name,members.phone_number,members.address,transactions.date_start,transactions.date_end,transaction_details.isbn,books.title,books.qty,publishers.name,authors.name,catalogs.name"))
                //->join('transactions','transactions.member_id','=','members.id')
                //->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
                //->join('books','transaction_details.isbn','=','books.isbn')
               // ->join('publishers','books.publisher_id','=','publishers.id')
               // ->join('authors','books.author_id','=','authors.id')
               // ->join('catalogs','books.catalog_id','=','catalogs.id')
                //->get();

        //no 15
        //$data15 = DB::table('catalogs')
                //->select(DB::raw("catalogs.id,catalogs.name,books.title")
                //->join('books','catalogs.id','books.catalog_id')
                //->get();