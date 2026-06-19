<?php

namespace App\Imports;

use App\Models\transaksikas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class TransaksiKasImport implements ToModel
{
    public function model(array $row)
    {
        // Skip header Excel
        if ($row[0] == 'Tanggal') {
            return null;
        }

        return new transaksikas([
            'tanggal' => $row[0],
            'keterangan' => $row[1],
            'nominal_bayar' => $row[2],
            'metode_pembayaran' => $row[3],
            'tipe_transaksi' => $row[4],
            'user_id' => Auth::id(),
        ]);
    }
}