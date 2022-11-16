<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $table = 'books';

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function catalog()
    {
        return $this->belongsTo('App\Models\Catalog', 'catalog_id');
    }
    public function details()
    {
        return $this->hasMany('App\Models\transactionDetail', 'book_id');
    }
    // public function transaction()
    // {
    //     return $this->belongsToMany('App\Models\transaction')->withPivot(['id']);
    // }
}
