@extends('layouts.add')

@section('title', 'Laporan Keuangan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/laporankeuangan.css') }}">
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

                <a href="{{ route('limitbudget') }}">

                    <i class='bx bx-wallet'></i>

                    Limit Budget

                </a>

            </li>

            <li>

                <a href="{{ route('pemasukan') }}">

                    <i class='bx bx-credit-card'></i>

                    Transaksi Kas

                </a>

            </li>

            <li class="active">

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

        <!-- HEADER -->

        <div class="laporan-header">

            <h1 class="title">
                Laporan Keuangan
            </h1>

            <div class="header-action">

    <button
        type="button"
        class="filter-btn"
        onclick="document.getElementById('filterModal').style.display='flex'"
    >
        <i class='bx bx-filter-alt'></i>
        Filter
    </button>

    <a
        href="{{ route('laporankeuangan.pdf', request()->all()) }}"
        class="download-btn"
    >
        <i class='bx bx-download'></i>
        Unduh PDF
    </a>

</div>

        </div>

        <!-- CARD -->

        <div class="laporan-card">

            <!-- TOP -->

            <div class="laporan-top">

                <h3>Akun</h3>

                <span>{{ $periode }}</span>

            </div>

            <!-- BODY 1 -->

            <div class="laporan-body">

                <div class="laporan-row">

                    <p>Total Pemasukan</p>

                   <span>Rp {{ number_format($totalPemasukan,0,',','.') }}</span>

                </div>

                <div class="laporan-row">

                   <p>Total Pengeluaran</p>

<span>
    Rp {{ number_format($totalPengeluaran,0,',','.') }}
</span>

                </div>

                <div class="laporan-row total">

                    <p>Saldo Akhir</p>

                   <span>
    Rp {{ number_format($saldo,0,',','.') }}
</span>
                </div>

            </div>

            <!-- BODY 2 -->

            <div class="laporan-body second">

                <div class="laporan-row">

                    <p>Pendapatan</p>

                    <span>
    Rp {{ number_format($totalPemasukan,0,',','.') }}
</span>

                </div>

                <div class="laporan-row">

                    <p>Biaya Usaha</p>

                   <span>
    Rp {{ number_format($totalPengeluaran,0,',','.') }}
</span>

                </div>

                <div class="laporan-row total">

                    <p>Laba Bersih</p>
                    <span>
    Rp {{ number_format($saldo,0,',','.') }}
</span>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- MODAL FILTER -->

<div
    class="delete-modal"
    id="filterModal"
    style="display:none;"
>

    <div class="modal-box">

        <h2 style="color:#3366ff;">
            Filter Laporan
        </h2>

        <form method="GET" action="{{ route('laporankeuangan') }}">

            <div class="form-group">

                <label>Jenis Filter</label>

                <select
                    id="jenisFilter"
                    name="filter"
                    class="modal-select"
                    onchange="toggleFilterInput()"
                >

                    <option value="harian">
                        Harian
                    </option>

                    <option value="bulanan">
                        Bulanan
                    </option>

                </select>

            </div>

            <!-- HARIAN -->

            <div
                class="form-group"
                id="filterHarian"
            >

                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="modal-input"
                >

            </div>

            <!-- BULANAN -->

            <div
                class="form-group"
                id="filterBulanan"
                style="display:none;"
            >

                <label>Bulan</label>

                <input
                    type="month"
                    name="bulan"
                    class="modal-input"
                >

            </div>

            <div class="modal-action">

                <button
    type="button"
    class="cancel-btn"
    onclick="closeFilterModal()"
>
    Batal
</button>

<a
    href="{{ route('laporankeuangan') }}"
    class="cancel-btn"
>
    Reset Filter
</a>

<button
    type="submit"
    class="save-btn"
>
    Terapkan
</button>

            </div>

        </form>

    </div>

</div>

<script>

function openFilterModal(){

    document.getElementById('filterModal')
        .style.display = 'flex';
}

function closeFilterModal(){

    document.getElementById('filterModal')
        .style.display = 'none';
}

function toggleFilterInput(){

    let jenis =
        document.getElementById('jenisFilter').value;

    if(jenis == 'harian'){

        document.getElementById('filterHarian')
            .style.display = 'block';

        document.getElementById('filterBulanan')
            .style.display = 'none';
    }
    else{

        document.getElementById('filterHarian')
            .style.display = 'none';

        document.getElementById('filterBulanan')
            .style.display = 'block';
    }
}

</script>

@endsection