<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function getLamaPinjamAttribute()
    {
        $tglPinjam = Carbon::parse($this->date_start);
        $tglKembali = Carbon::parse($this->date_end);
        return $tglPinjam->diffInDays($tglKembali);
    }
}
