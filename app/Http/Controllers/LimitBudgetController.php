<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\limitbudget;
use App\Models\transaksikas;
use Illuminate\Support\Facades\Auth;

class LimitBudgetController extends Controller
{
    // HALAMAN LIMIT BUDGET

    public function index()
    {
        // SEMUA RIWAYAT LIMIT

        $data = limitbudget::where('user_id', Auth::id())
            ->orderBy('tanggal_diubah', 'desc')
            ->get();

        // LIMIT BULAN INI

        $budget = limitbudget::where('user_id', Auth::id())
            ->where('bulan', now()->month)
            ->where('tahun', now()->year)
            ->first();

        // TOTAL PENGELUARAN BULAN INI

        $totalPengeluaran = transaksikas::where('user_id', Auth::id())
            ->where('tipe_transaksi', 'Pengeluaran')
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('nominal_bayar');

        // TOTAL LIMIT

        $totalLimit = $budget ? $budget->total_limit : 0;

        // SISA LIMIT

        $sisaLimit = $totalLimit - $totalPengeluaran;

        return view('limitbudget', compact(
            'budget',
            'data',
            'totalLimit',
            'totalPengeluaran',
            'sisaLimit'
        ));
    }

    // SIMPAN LIMIT BARU

    public function store(Request $request)
    {
        limitbudget::create([

            'tanggal_diubah' => now(),
            'bulan' => now()->month,
            'tahun' => now()->year,
            'deskripsi' => $request->deskripsi,
            'total_limit' => $request->total_limit,
            'sisa_limit' => $request->total_limit,
            'status' => 'Aktif',
            'user_id' => Auth::id(),
    ]);

        return redirect()->route('limitbudget');
    }

    // UPDATE LIMIT

    public function update(Request $request, $id)
    {
        $budget = limitbudget::findOrFail($id);

        $totalPengeluaran = transaksikas::where('user_id', Auth::id())
            ->where('tipe_transaksi', 'Pengeluaran')
            ->whereMonth('tanggal', $budget->bulan)
            ->whereYear('tanggal', $budget->tahun)
            ->sum('nominal_bayar');

        $budget->update([

            'deskripsi' => $request->deskripsi,
            'total_limit' => $request->total_limit,
            'sisa_limit' => $request->total_limit - $totalPengeluaran,

        ]);

        return redirect()->route('limitbudget');
    }
}