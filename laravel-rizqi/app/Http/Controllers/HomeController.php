<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
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
        // $members = Member::with('user')->get();
        // $publisher = Publisher::with('books')->get();
        // $catalog = Catalog::with('books')->get();
        // $author = Author::with('books')->get();
        // $book = Book::with('author')->get();
        $book = Book::with('catalog')->get();
        // $book = Book::with('publisher')->get();

        return $book;
        // return $author;
        // return $catalog;
        // return $publisher;
        // return $members;
        // return view('home');
    }
}
