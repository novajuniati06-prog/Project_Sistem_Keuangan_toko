<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class limitbudget extends Model
{
    protected $table = 'limit_budget';
    protected $fillable = [

        'tanggal_diubah',
        'deskripsi',
        'total_limit',
        'sisa_limit',
        'status',
        'user_id',
        'bulan',
        'tahun',

    ];
}