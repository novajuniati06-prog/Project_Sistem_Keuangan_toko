@extends('layouts.add')

@section('title', 'Tambah Transaksi')

@section('content')

<div class="container">

    <div class="main">

        <h1>Tambah Transaksi</h1>

        <form action="{{ route('transaksi.store') }}" method="POST">

            @csrf

            <input type="date" name="tanggal">

            <input type="text" name="keterangan" placeholder="Keterangan">

            <input type="number" name="nominal_bayar" placeholder="Nominal">

            <select name="metode_pembayaran">

                <option value="Cash">Cash</option>
                <option value="Bank">Bank</option>

            </select>

            <input type="hidden" name="tipe_transaksi" value="{{ $tipe }}">

            <button type="submit">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection
