<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_pinjam';

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'id_pinjam');
    }

    public function anggota()
    {
        return $this->belongsTo(Member::class, 'id_anggota');
    }

    public function getLamaPinjamAttribute()
    {
        $tglPinjam = Carbon::parse($this->tgl_pinjam);
        $tglKembali = Carbon::parse($this->tgl_kembali);
        return $tglPinjam->diffInDays($tglKembali);
    }
}
