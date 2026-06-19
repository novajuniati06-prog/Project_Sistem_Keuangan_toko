<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksikas;
use App\Models\limitbudget;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TemplateTransaksiExport;

class TransaksiKasController extends Controller
{
    // HALAMAN PEMASUKAN

    public function pemasukan(Request $request)
{
    $search = $request->search;
    $tanggal_awal = $request->tanggal_awal;
    $tanggal_akhir = $request->tanggal_akhir;

    $data = transaksikas::where('user_id', Auth::id())
        ->where('tipe_transaksi', 'Pemasukan')

        ->when($search, function($query) use ($search){

            $query->where(function($q) use ($search){

                $q->where('keterangan', 'like', "%$search%")
                  ->orWhere('metode_pembayaran', 'like', "%$search%")
                  ->orWhere('nominal_bayar', 'like', "%$search%");
            });

        })

        ->when($tanggal_awal && $tanggal_akhir, function($query) use ($tanggal_awal, $tanggal_akhir){

    $query->whereBetween('tanggal', [
        $tanggal_awal,
        $tanggal_akhir
    ]);

})

    ->get();

    return view('pemasukan', compact('data'));
}

    // HALAMAN PENGELUARAN

    public function pengeluaran(Request $request)
{
    $search = $request->search;
    $tanggal_awal = $request->tanggal_awal;
    $tanggal_akhir = $request->tanggal_akhir;

    $data = transaksikas::where('user_id', Auth::id())
        ->where('tipe_transaksi', 'Pengeluaran')

        ->when($search, function($query) use ($search){

            $query->where(function($q) use ($search){

                $q->where('keterangan', 'like', "%$search%")
                  ->orWhere('metode_pembayaran', 'like', "%$search%")
                  ->orWhere('nominal_bayar', 'like', "%$search%");
            });

        })

        ->when($tanggal_awal && $tanggal_akhir, function($query) use ($tanggal_awal, $tanggal_akhir){

    $query->whereBetween('tanggal', [
        $tanggal_awal,
        $tanggal_akhir
    ]);

})

        ->get();

        $budget = limitbudget::where('user_id', Auth::id())
    ->where('bulan', now()->month)
    ->where('tahun', now()->year)
    ->first();

$totalPengeluaran = transaksikas::where('user_id', Auth::id())
    ->where('tipe_transaksi', 'Pengeluaran')
    ->whereMonth('tanggal', now()->month)
    ->whereYear('tanggal', now()->year)
    ->sum('nominal_bayar');

$persentaseBudget = 0;
$sisaLimit = 0;

if($budget){

    $sisaLimit =
        $budget->total_limit - $totalPengeluaran;

    $persentaseBudget =
        ($totalPengeluaran / $budget->total_limit) * 100;

}

   return view('pengeluaran', compact(
    'data',
    'budget',
    'totalPengeluaran',
    'persentaseBudget',
    'sisaLimit'
));
}

    // FORM TAMBAH TRANSAKSI

    public function create($tipe)
    {
        return view('tambahtransaksi', compact('tipe'));
    }

    // SIMPAN TRANSAKSI

    public function store(Request $request)
    {
        transaksikas::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal_bayar' => $request->nominal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tipe_transaksi' => $request->tipe_transaksi,
            'user_id' => Auth::id(),
        ]);

        if ($request->tipe_transaksi == 'Pengeluaran') {
            return redirect()->route('pengeluaran');
        }

        return redirect()->route('pemasukan');
    }

    // FORM EDIT

    public function edit($id)
    {
        $data = transaksikas::findOrFail($id);

        return view('edittransaksi', compact('data'));
    }

    // UPDATE DATA

    public function update(Request $request, $id)
    {
        $data = transaksikas::findOrFail($id);

        $data->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal_bayar' => $request->nominal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        if ($data->tipe_transaksi == 'Pengeluaran') {
            return redirect()->route('pengeluaran');
        }

        return redirect()->route('pemasukan');
    }

    // DELETE DATA

    public function delete($id)
    {
        $data = transaksikas::findOrFail($id);
        $tipe = $data->tipe_transaksi;
        $data->delete();

        if ($tipe == 'Pengeluaran') {
            return redirect()->route('pengeluaran');
        }

        return redirect()->route('pemasukan');
    }

    // DOWNLOAD TEMPLATE EXCEL

    public function downloadTemplate()
    {
        return Excel::download(
            new TemplateTransaksiExport(),
            'template_transaksi.xlsx'
        );
    }

    // IMPORT EXCEL

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $rows = Excel::toArray([], $request->file('file'));

       foreach ($rows[0] as $index => $row) {

    // Skip header
    if ($index == 0) {
        continue;
    }

    // Skip contoh data template
    if (
        isset($row[1]) &&
        ($row[1] == 'Contoh Gaji' || $row[1] == 'Contoh Bensin')
    ) {
        continue;
    }

            $tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0])
                ->format('Y-m-d');

            transaksikas::create([
                'tanggal' => $tanggal,
                'keterangan' => $row[1],
                'nominal_bayar' => $row[2],
                'metode_pembayaran' => $row[3],
                'tipe_transaksi' => $row[4],
                'user_id' => Auth::id(),
            ]);
        }

        return back()->with(
            'success',
            'Data berhasil diimport'
        );
    }
}   