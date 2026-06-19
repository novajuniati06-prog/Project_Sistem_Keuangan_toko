<?php

namespace App\Http\Controllers;

use App\Models\transaksikas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL PEMASUKAN

        $totalPemasukan = transaksikas::where('user_id', Auth::id())
            ->where('tipe_transaksi', 'Pemasukan')
            ->sum('nominal_bayar');

        // TOTAL PENGELUARAN

        $totalPengeluaran = transaksikas::where('user_id', Auth::id())
            ->where('tipe_transaksi', 'Pengeluaran')
            ->sum('nominal_bayar');

        // SALDO

        $saldo = $totalPemasukan - $totalPengeluaran;

        // TOTAL TRANSAKSI

        $totalTransaksi = transaksikas::where('user_id', Auth::id())
            ->count();

        // TRANSAKSI TERBARU

        $transaksiTerbaru = transaksikas::where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'totalTransaksi',
            'transaksiTerbaru'
        ));
    }
}