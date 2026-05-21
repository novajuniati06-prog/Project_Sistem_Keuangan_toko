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

            <li class="active">

                <a href="{{ route('dashboard') }}">

                    <i class='bx bx-home'></i>

                    Dashboard

                </a>

            </li>

            <li>

                <a href="{{ route('mitrabisnis') }}">

                    <i class='bx bx-group'></i>

                    Mitra Bisnis

                </a>

            </li>

            <li>

                <a href="{{ route('akunkeuangan') }}">

                    <i class='bx bx-wallet'></i>

                    Akun Keuangan

                </a>

            </li>

            <li>

                <a href="#">

                    <i class='bx bx-credit-card'></i>

                    Transaksi Kas

                </a>

            </li>

            <li>

                <a href="#">

                    <i class='bx bx-file'></i>

                    Laporan Keuangan

                </a>

            </li>

        </ul>

    </div>

    <!-- MAIN -->

    <div class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="profile">

    <div class="profile-header">

        <i class='bx bx-user user-icon'></i>

        <div class="profile-text">

            <h4>Nama</h4>

            <p>Administrator</p>

        </div>

        <i class='bx bx-chevron-down dropdown-icon'></i>

    </div>

    <!-- DROPDOWN -->

    <div class="profile-dropdown">

        <a href="{{ route('login') }}">

            <i class='bx bx-log-out'></i>

            Logout

        </a>

    </div>

</div>

        </div>

        <!-- TITLE -->

        <h1 class="welcome">
            Welcome back, <span>(nama)</span> !
        </h1>

        <!-- CARDS -->

        <div class="cards">

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-wallet'></i>
                    </div>

                    <h3>
                        Transaksi Keluar <br>
                        Hari ini
                    </h3>

                </div>

                <h2>Rp. -</h2>

            </div>

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-box'></i>
                    </div>

                    <h3>
                        Transaksi Masuk <br>
                        Hari ini
                    </h3>

                </div>

                <h2>Rp. -</h2>

            </div>

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-wallet-alt'></i>
                    </div>

                    <h3>
                        Total Transaksi <br>
                        Hari ini
                    </h3>

                </div>

                <h2>Rp. -</h2>

            </div>

            <div class="card">

                <div class="card-top">

                    <div class="icon blue">
                        <i class='bx bxs-credit-card'></i>
                    </div>

                    <h3>
                        Total Transaksi <br>
                        Keseluruhan
                    </h3>

                </div>

                <h2>Rp. -</h2>

            </div>

        </div>

        <!-- RINGKASAN -->

        <div class="summary">

            <h3>Ringkasan Bulan ini</h3>

            <div class="summary-item">

                <div class="circle green"></div>

                <p>Transaksi Masuk</p>

            </div>

            <div class="summary-item">

                <div class="circle pink"></div>

                <p>Transaksi Keluar</p>

            </div>

        </div>

    </div>

</div>

@endsection

@section('js')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection