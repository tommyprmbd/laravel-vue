<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();

        return view('admin.product', compact('products', 'categories'));
    }

    public function api(Request $request)
    { 
        $products = Product::all();

        $datatables = datatables()->of($products)
        ->addColumn('product_kode', function($products){
            return '<span class="badge badge-success">'. $products->product_kode .'</span>';
        })
        ->rawColumns(['product_kode'])
        ->addIndexColumn();

        return $datatables->make(true);
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
       // $products = Product::latest()->first();
       // $request['product_kode'] = 'P'. tambah_nol_didepan((int)$products->product_id+1, 6);

        $products = Product::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        dd(request);
        $this->validate($request,[
            'category_id' => ['required'],
            'product_kode' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'harga_beli' => ['required'],
            'discount' => ['required'],
            'harga_jual' => ['required'],
            'stock' => ['required'],
        ]);

        $products->update($request->all());

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
