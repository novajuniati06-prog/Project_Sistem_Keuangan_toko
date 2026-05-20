@extends('layouts.add')

@section('title', 'Akun Keuangan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/akunkeuangan.css') }}">
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

            <li>

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

            <li class="active">

                <a href="{{ route('akunkeuangan') }}">

                    <i class='bx bx-wallet'></i>

                    Akun Keuangan

                </a>

            </li>

            <li>

                <a href="#">

                    <i class='bx bx-credit-card'></i>

                    Transaksi kas

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

                <div class="profile-dropdown">

                    <a href="{{ route('login') }}">

                        <i class='bx bx-log-out'></i>

                        Logout

                    </a>

                </div>

            </div>

        </div>

        <!-- TITLE -->

        <h1 class="title">
            Akun Keuangan
        </h1>

        <!-- ACTION -->

        <div class="action">

            <div class="left-action">

                <button class="add-btn">

                    <i class='bx bx-plus'></i>

                    Tambah

                </button>

                <button class="filter-btn">

                    <i class='bx bx-filter-alt'></i>

                    Filter

                </button>

            </div>

            <!-- SEARCH -->

            <div class="search-box">

                <i class='bx bx-search'></i>

                <input
                    type="text"
                    placeholder="Cari"
                >

            </div>

        </div>

        <!-- TABLE -->

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nomor Akun</th>
                    <th>Nama Akun</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>
                    <td>AK-1100</td>
                    <td>Bank</td>

                    <td class="aksi">

                        <button class="edit">

                            <i class='bx bxs-pencil'></i>

                        </button>

                        <button class="delete">

                            <i class='bx bxs-trash'></i>

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

        <!-- PAGINATION -->

        <div class="pagination">

            <p>Menampilkan 1 dari 2 entri</p>

            <div class="page-number">

                <span class="active-page">1</span>

                <span>2</span>

            </div>

        </div>

    </div>

</div>

@endsection

@section('js')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection