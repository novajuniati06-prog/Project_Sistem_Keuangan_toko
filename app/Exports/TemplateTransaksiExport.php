<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromArray;
class TemplateTransaksiExport implements FromArray
{
    public function array(): array
    {
        return [
            [
                'Tanggal',
                'Keterangan',
                'Nominal Bayar',
                'Metode Pembayaran',
                'Tipe Transaksi'
            ],
            [
                '01/01/2026',
                'Contoh Gaji',
                '5000000',
                'Bank',
                'Pemasukan'
            ],
            [
                '02/01/2026',
                'Contoh Bensin',
                '50000',
                'Cash',
                'Pengeluaran'
            ]
        ];
    }
}