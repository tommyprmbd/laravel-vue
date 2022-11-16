<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'book_id',
        'qty'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Models\transaction', 'transaction_id');
    }
    public function books()
    {
        return $this->belongsTo('App\Models\books', 'book_id');
    }

    public function onebooks()
    {
        return $this->hasMany('App\Models\books', 'id');
    }
    public function transDetail()
    {
        return $this->hasMany('App\Models\transaction', 'transaction_id');
    }
}
