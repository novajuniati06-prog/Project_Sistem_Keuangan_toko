<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Laporan Keuangan</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:14px;
        }

        h1,h2,h3{
            text-align:center;
            margin:0;
        }

        hr{
            margin:20px 0;
        }

        .ringkasan{
            width:100%;
            margin-top:10px;
            margin-bottom:25px;
        }

        .ringkasan td{
            padding:5px 0;
        }

        .transaksi{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        .transaksi th{
            border:1px solid black;
            padding:8px;
            background:#eeeeee;
        }

        .transaksi td{
            border:1px solid black;
            padding:8px;
        }

        .right{
            text-align:right;
        }

        .footer{
            margin-top:25px;
        }

    </style>
</head>

<body>

    <h1>{{ auth()->user()->shop_name ?? 'DELTA FINANCE' }}</h1>
    <br>
    <h2>LAPORAN KEUANGAN</h2>

    <hr>

    <p>
    <strong>Periode :</strong>
    {{ $periode }}
</p>

<p>
    <strong>Nama Pengguna :</strong>
    {{ $namaUser }}
</p>

    <h3 style="text-align:left;">
        Ringkasan
    </h3>

    <table class="ringkasan">

        <tr>
            <td>Total Pemasukan</td>
            <td class="right">
                Rp {{ number_format($totalPemasukan,0,',','.') }}
            </td>
        </tr>

        <tr>
            <td>Total Pengeluaran</td>
            <td class="right">
                Rp {{ number_format($totalPengeluaran,0,',','.') }}
            </td>
        </tr>

        <tr>
            <td><strong>Laba Bersih</strong></td>
            <td class="right">
                <strong>
                    Rp {{ number_format($saldo,0,',','.') }}
                </strong>
            </td>
        </tr>

        <tr>
    <td>Jumlah Transaksi</td>
    <td class="right">
        {{ $jumlahTransaksi }}
    </td>
</tr>

    </table>

    <h3 style="text-align:left;">
        Rincian Transaksi
    </h3>

    <table class="transaksi">

        <thead>

           <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Tipe</th>
    <th>Metode Pembayaran</th>
    <th>Nominal</th>
</tr>

        </thead>

        <tbody>

            @foreach($transaksi as $index => $item)

           <tr>

    <td>
        {{ $index + 1 }}
    </td>

    <td>
        {{ date('d-m-Y', strtotime($item->tanggal)) }}
    </td>

                <td>
                    {{ $item->keterangan }}
                </td>

                <td>
    {{ $item->tipe_transaksi }}
</td>

<td>
    {{ $item->metode_pembayaran }}
</td>

<td class="right">
    Rp {{ number_format($item->nominal_bayar,0,',','.') }}
</td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="footer">

        Dicetak pada:
        {{ date('d F Y') }}

    </div>

</body>
</html>