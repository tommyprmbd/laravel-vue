<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::with('books')->get();

        return view('admin.catalog.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // add data : buat di controller, Model, Route dan tampilan di View

        // cara pertama untuk tambah data ke database
        // $catalog = new Catalog;
        // $catalog->nama = $request->nama;
        // $catalog->save();

        // cara kedua
        $validatedCatalog = $request->validate([
            'nama' => 'required|unique:catalogs|max:255',
        ]);

        Catalog::create($request->all());

        return redirect('catalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */

     //  update data : buat file edit.blade, buat routesnya diberi id dibelakangnya, dan isi method edit dgn menampilkan halaman dan mengambil data catalog
    //  lalu untuk mengirim data ke databasenya tambahkan @method('PUT') di file edit didalam form, dengan  <form action="/catalog/{{ $catalog->id }}" method="post">, membuat route ke public funtion update, lalu isi dengan $catalog->update($request->all());
    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        $validatedCatalog = $request->validate([
            'nama' => ['required'],
        ]);
        $catalog->update($request->all());

        return redirect('catalog');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect('catalog');
    }
}
