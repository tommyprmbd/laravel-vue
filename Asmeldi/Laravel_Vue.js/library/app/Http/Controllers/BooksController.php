<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use Illuminate\Http\Request;

class BooksController extends Controller
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
        // $allBooks = books::with(['publisher', 'author', 'catalog'])->get();
        // $allBooks = books::with(['publisher'])->get();
        // $allBooks = books::with(['author'])->get();
        // $allBooks = books::with(['catalog'])->get();
        // $apiBooks = $this->api();
        $books = books::all();

        $publisher = collect(Publisher::get());
        $Author = collect(Author::get());
        $Catalog = collect(Catalog::get());
        return view('Admin.Book.index', compact('books', 'publisher', 'Author', 'Catalog'));
    }

    public function api(Request $request)
    {
        $books = books::all();

        foreach ($books as $key => $book) {
            $book->name_publisher =  $book->publisher->name;
            $book->name_author =  $book->author->name;
            $book->name_catalog =  $book->catalog->name;
        }
        // json_encode berfungsi merubah json menjadi sting
        return json_encode($books);
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
        $validate = $this->validate($request, [
            'isbn' => ['required'],
            'title' => ['required'],
            'year' => ['required'],
            'publisher_id' => [''],
            'author_id' => [''],
            'catalog_id' => [''],
            'qty' => ['required'],
            'price' => ['required'],
        ]);

        books::create($request->all());

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, books $books)
    {
        $validate = $this->validate($request, [
            'isbn' => ['required'],
            'title' => ['required'],
            'year' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'catalog_id' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
        ]);

        $books->where('id', '=', $id)->update($validate);

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, books $books)
    {
        $books->where('id', '=', $id)->delete();
        return redirect('books');
    }
}
