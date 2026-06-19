<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\limitbudget;
use App\Models\transaksikas;
use App\Models\laporankeuangan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{
    public function limitbudget()
    {
        $data = limitbudget::where('user_id', Auth::id())->get();
        $totalLimit = $data->sum('total_limit');
        $totalPengeluaran = transaksikas::where('user_id', Auth::id())
            ->where('tipe_transaksi', 'Pengeluaran')
            ->sum('nominal_bayar');

            $sisaBudget = $totalLimit - $totalPengeluaran;

        return view('limitbudget', compact(
            'data',
            'totalLimit',
            'totalPengeluaran',
            'sisaBudget'
        ));
    }

    public function transaksikas()
    {
        $data = transaksikas::where('user_id', Auth::id())->get();

        return view('transaksikas', compact('data'));
    }

    public function laporankeuangan(Request $request)
    {
        $query = transaksikas::where('user_id', Auth::id());
        $periode = 'Semua Data';

        if ($request->filter == 'harian' && $request->tanggal) {
            $periode = date('d F Y', strtotime($request->tanggal));
            $query->whereDate('tanggal', $request->tanggal);

        } elseif ($request->filter == 'bulanan' && $request->bulan) {

            $periode = date('F Y', strtotime($request->bulan));
            $bulan = date('m', strtotime($request->bulan));
            $tahun = date('Y', strtotime($request->bulan));
            $query->whereMonth('tanggal', $bulan)
                  ->whereYear('tanggal', $tahun);
        }

        $totalPemasukan = (clone $query)
            ->where('tipe_transaksi', 'Pemasukan')
            ->sum('nominal_bayar');

        $totalPengeluaran = (clone $query)
            ->where('tipe_transaksi', 'Pengeluaran')
            ->sum('nominal_bayar');

        $saldo = $totalPemasukan - $totalPengeluaran;

        return view(
            'laporankeuangan',
            compact(
                'totalPemasukan',
                'totalPengeluaran',
                'saldo',
                'periode'
            )
        );
    }

    public function downloadPdf(Request $request)
{
    $query = transaksikas::where('user_id', Auth::id());

    $periode = 'Semua Data';

    if ($request->filter == 'harian' && $request->tanggal) {

        $periode = date('d F Y', strtotime($request->tanggal));

        $query->whereDate('tanggal', $request->tanggal);

    } elseif ($request->filter == 'bulanan' && $request->bulan) {

        $periode = date('F Y', strtotime($request->bulan));

        $bulan = date('m', strtotime($request->bulan));
        $tahun = date('Y', strtotime($request->bulan));

        $query->whereMonth('tanggal', $bulan)
              ->whereYear('tanggal', $tahun);
    }

    $totalPemasukan = (clone $query)
        ->where('tipe_transaksi', 'Pemasukan')
        ->sum('nominal_bayar');

    $totalPengeluaran = (clone $query)
        ->where('tipe_transaksi', 'Pengeluaran')
        ->sum('nominal_bayar');

    $saldo = $totalPemasukan - $totalPengeluaran;

$transaksi = (clone $query)
    ->orderBy('tanggal', 'asc')
    ->get();

$jumlahTransaksi = $transaksi->count();

$namaUser = Auth::user()->name;
$pdf = Pdf::loadView('laporanpdf', compact(
    'periode',
    'totalPemasukan',
    'totalPengeluaran',
    'saldo',
    'transaksi',
    'jumlahTransaksi'
), [
    'namaUser' => Auth::user()->name
]);

if ($request->filter == 'bulanan' && $request->bulan) {

    $namaFile = 'Laporan-Keuangan_' . $request->bulan . '.pdf';

} elseif ($request->filter == 'harian' && $request->tanggal) {

    $namaFile = 'Laporan-Keuangan_' . $request->tanggal . '.pdf';

} else {

    $namaFile = 'Laporan-Keuangan_Semua-Data.pdf';
}

    return $pdf->download($namaFile);
}
}