<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $primaryKey = 'id_anggota';

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_anggota');
    }
}
