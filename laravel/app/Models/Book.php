<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'isbn';

    protected $keyType = 'string';

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'isbn');
    }
}
