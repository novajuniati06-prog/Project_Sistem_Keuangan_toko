@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.add')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')

<div class="container">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo">

            <img src="{{ asset('image/img.png') }}">

            <h2>
                Delta <br>
                Finance
            </h2>

        </div>

        <ul>

            <!-- DASHBOARD -->

            <li class="active">

                <a href="{{ route('dashboard') }}">

                    <i class='bx bx-home'></i>

                    Dashboard

                </a>

            </li>

            <!-- LIMIT BUDGET -->

            <li>

                <a href="{{ route('limitbudget') }}">

                    <i class='bx bx-wallet'></i>

                    Limit Budget

                </a>

            </li>

            <!-- TRANSAKSI -->

            <li>

                <a href="{{ route('pemasukan') }}">

                    <i class='bx bx-credit-card'></i>

                    Transaksi Kas

                </a>

            </li>

            <!-- LAPORAN -->

            <li>

                <a href="{{ route('laporankeuangan') }}">

                    <i class='bx bx-file'></i>

                    Laporan Keuangan

                </a>

            </li>

        </ul>

    </div>

    <!-- MAIN -->

    <div class="main">

       @include('partials.topbar')

        <!-- TITLE -->

        <h1 class="welcome">
            Welcome back, <span>{{ auth()->user()->name ?? 'Guest' }}</span> !
        </h1>

        <!-- CARDS -->

        <div class="cards">

            <!-- PENGELUARAN -->

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-wallet'></i>
                    </div>

                    <h3>
                        Total <br>
                        Pengeluaran
                    </h3>

                </div>

                <h2>
                    Rp {{ number_format($totalPengeluaran,0,',','.') }}
                </h2>

            </div>

            <!-- PEMASUKAN -->

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-box'></i>
                    </div>

                    <h3>
                        Total <br>
                        Pemasukan
                    </h3>

                </div>

                <h2>
                    Rp {{ number_format($totalPemasukan,0,',','.') }}
                </h2>

            </div>

            <!-- SALDO -->

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-wallet-alt'></i>
                    </div>

                    <h3>
                        Saldo <br>
                        Saat Ini
                    </h3>

                </div>

                <h2>
                    Rp {{ number_format($saldo,0,',','.') }}
                </h2>

            </div>

            <!-- TOTAL TRANSAKSI -->

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-credit-card'></i>
                    </div>

                    <h3>
                        Total <br>
                        Transaksi
                    </h3>

                </div>

                <h2>
                    {{ $totalTransaksi }}
                </h2>

            </div>

        </div>

        <!-- TRANSAKSI TERBARU -->

        <div class="summary">

            <h3>Transaksi Terbaru</h3>

            @forelse ($transaksiTerbaru as $item)

            <div class="summary-item">

                @if($item->tipe_transaksi == 'Pemasukan')

                    <div class="circle green"></div>

                @else

                    <div class="circle pink"></div>

                @endif

                <p>

                    {{ $item->keterangan }}

                    -

                    Rp {{ number_format($item->nominal_bayar,0,',','.') }}

                </p>

            </div>

            @empty

            <div class="summary-item">

                <p>Belum ada transaksi</p>

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection

