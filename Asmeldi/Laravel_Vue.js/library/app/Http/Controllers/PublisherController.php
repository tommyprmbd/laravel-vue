<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
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

        return view('Admin.Publisher.index');
    }
    public function api()
    {
        $publishers = Publisher::with('books')->get();
        $dataTables = datatables()->of($publishers)
            ->addColumn('tanggal_buat', function ($author) {
                return DateFormat($author->created_at);
            })
            ->addIndexColumn();

        // return $Author;
        return $dataTables->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Publisher.create');
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

        Publisher::create($request->all());

        return redirect('publishers');
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
    public function edit(Publisher $publisher)
    {
        return view('Admin.Publisher.edit', compact('publisher'));
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
        $validate = $this->validate($request, [
            'name' => ['required', 'min:8', 'max:30'],
            'email' => ['required', 'min:8', 'max:30'],
            'phone_number' => ['required', 'min:12', 'max:13'],
            'adress' => ['required', 'min:20', 'max:100'],
        ]);
        $publisher->update($request->all());

        return redirect('publishers');
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
        return redirect('publishers');
    }
}
