<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class transaksikas extends Model
{
    protected $table = 'transaksi_kas';
    protected $fillable = [
        'tanggal',
        'keterangan',
        'nominal_bayar',
        'metode_pembayaran',
        'tipe_transaksi',
        'user_id',
    ];
}
