<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//model
use App\Models\Author;
use App\Models\Members;
use App\Models\books;
use App\Models\Publisher;
use App\Models\transaction;

class DataMasterController extends Controller
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
        $total_anggota = Members::count();
        $total_buku = books::count();
        $total_peminjaman = transaction::count();
        $total_penerbit = Publisher::count();

        $data_donut = books::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');
        $label_bar = ['Peminjaman', 'pengembalian'];
        $data_bar = [];
        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222.3)';
            $data_month = [];
            foreach (range(1, 6) as $month) {
                if ($key == 0) {
                    $data_month[] = transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }
        return view('Admin.DataMaster.index', compact('total_anggota', 'total_buku', 'total_peminjaman', 'total_penerbit', 'data_donut', 'label_donut', 'data_bar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function api()
    {
        $Authors = Author::with('books')->get();

        // foreach ($Authors as $key => $author) {
        //     $author->tanggal_buat = DateFormat($author->created_at);
        //     $author->updated = DateFormat($author->updated_at);
        // }
        //yajra datatable

        $dataTables = datatables()->of($Authors)
            ->addColumn('tanggal_buat', function ($author) {
                return DateFormat($author->created_at);
            })->addIndexColumn();

        // return $Author;
        return $dataTables->make(true);
    }
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
        $validate = $this->validate($request, [
            'name' => ['required', 'min:8', 'max:30'],
            'email' => ['required', 'min:8', 'max:30'],
            'phone_number' => ['required', 'min:12', 'max:13'],
            'adress' => ['required', 'min:20', 'max:100'],
        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validate = $this->validate($request, [
            'name' => ['required', 'min:8', 'max:30'],
            'email' => ['required', 'min:8', 'max:30'],
            'phone_number' => ['required', 'min:12', 'max:13'],
            'adress' => ['required', 'min:20', 'max:100'],
        ]);

        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect('authors');
    }
}
