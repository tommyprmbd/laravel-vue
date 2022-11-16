<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [
        'name',
        'gender',
        'phone_number',
        'adress',
        'email',
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }
    public function transaction()
    {
        return $this->hasMany('App\Models\transaction', 'member_id');
    }
}
