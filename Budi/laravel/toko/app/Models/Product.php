<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'product_kode', 'name', 'brand', 'harga_beli', 'discount', 'harga_jual', 'stock'];

    public function category(){
    	return $this->belongsTo('App\Models\Category','category_id');
    }
}
