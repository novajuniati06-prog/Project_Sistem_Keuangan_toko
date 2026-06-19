<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporankeuangan extends Model
{
    protected $table = 'laporan_keuangan';

    protected $fillable = [
        'pendapatan',
        'pengeluaran',
        'total',
        'tanggal',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}