<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        return view('Admin.Author.index');
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
