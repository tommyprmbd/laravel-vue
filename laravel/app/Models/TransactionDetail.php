<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';

    public function book()
    {
        return $this->belongsTo(Book::class, 'isbn');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_pinjam');
    }
}
