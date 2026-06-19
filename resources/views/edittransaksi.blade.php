@extends('layouts.add')

@section('title', 'Edit Transaksi')

@section('content')

<div class="container">

    <div class="main">

        <h1>Edit Transaksi</h1>

        <form action="{{ route('transaksi.update', $data->id) }}" method="POST">

            @csrf

            <input type="date" name="tanggal" value="{{ $data->tanggal }}">

            <input type="text"
                   name="keterangan"
                   value="{{ $data->keterangan }}">

            <input type="number"
                   name="nominal_bayar"
                   value="{{ $data->nominal_bayar }}">

            <select name="metode_pembayaran">

                <option value="Cash"
                    {{ $data->metode_pembayaran == 'Cash' ? 'selected' : '' }}>
                    Cash
                </option>

                <option value="Bank"
                    {{ $data->metode_pembayaran == 'Bank' ? 'selected' : '' }}>
                    Bank
                </option>

            </select>

            <button type="submit">

                Update

            </button>

        </form>

    </div>

</div>

@endsection