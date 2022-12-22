<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AuthorController extends Controller
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
        // jika hanya 1 tabel tanpa relasi bisa pakai dibawah ini
        // $author = Author::all();
        // $author = Author::with('books')->get();
        // return view('admin.author', compact('author'));
        return view('admin.author');
    }

    public function api()
    {
        $authors = Author::all();
        $datatables = DataTables::of($authors)->addIndexColumn();

        return $datatables->make(true);
        // untuk menampilkan yajra datatables laraverl :
        // composer -> route web -> controller -> vue js di viewnya
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validatedAuthor = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        Author::create($request->all());

        return redirect('author');
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
        $validatedAuthor = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        $author->update($request->all());

        return redirect('author');
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
    }
}
