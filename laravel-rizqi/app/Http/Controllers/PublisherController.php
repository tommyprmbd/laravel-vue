<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PublisherController extends Controller
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
        $publisher = Publisher::with('books')->get();
        
        return view('admin.publisher', compact('publisher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedPublisher = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        
        // add data : buat di controller, Model, Route dan tampilan di View
        Publisher::create($request->all());

        return redirect('publisher');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */

    //  update data : buat file edit.blade, buat routesnya diberi id dibelakangnya, dan isi method edit dgn menampilkan halaman dan mengambil data publisher
    //  lalu untuk mengirim data ke databasenya tambahkan @method('PUT') di file edit didalam form, dengan  <form action="/publisher/{{ $publisher->id }}" method="post">, membuat route ke public funtion update, lalu isi dengan $publisher->update($request->all());
    public function edit(Publisher $publisher)
    {
        // return view('admin.publisher.edit', compact('publisher')); //menampilkan halaman dan mengambil data publisher
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validatedPublisher = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        $publisher->update($request->all());

        return redirect('publisher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect('publisher');
    }
}
