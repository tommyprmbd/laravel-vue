<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'member_id',
        'date_start',
        'date_end',
        'status'
    ];

    public function transactiondetils()
    {
        return $this->hasMany('App\Models\transactionDetail', 'transaction_id');
    }
    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'member_id');
    }

    public function firstMembers()
    {
        return $this->hasMany('App\Models\Members', 'id');
    }
    public function id_detail()
    {
        return $this->hasOne('App\Models\transactionDetail', 'id');
    }


    // public function asmeldi()
    // {
    //     return $this->belongsToMany('App\Models\transactionDetail')->withPivot(['id']);
    // }
}
