@extends('layouts.add')

@section('title', 'Limit Budget')

@section('css')
<link rel="stylesheet" href="{{ asset('css/limitbudget.css') }}">
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

            <li class="active">
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

        <h1 class="title">
            Limit Budget
        </h1>

        <!-- ALERT -->

        @if($sisaLimit < 0)

        <div class="alert-box">

            <i class='bx bxs-error'></i>

            <div class="alert-content">

                <h4>Limit Budget Terlewati !</h4>

                <p>
                    Pemakaian sudah melebihi batas limit budget.
                </p>

            </div>

        </div>

        @endif

        <!-- FORM -->

        <div class="form-card">

            <form action="{{ route('limitbudget.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label>Total Limit Budget</label>

                    <input 
                        type="number"
                        name="total_limit"
                        placeholder="Masukkan limit budget"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Deskripsi</label>

                    <input 
                        type="text"
                        name="deskripsi"
                        placeholder="Contoh : Budget Bulanan"
                        required
                    >

                </div>

                <button type="submit" class="save-btn">

                    <i class='bx bx-save'></i>

                    Simpan Limit

                </button>

            </form>

        </div>

        <!-- CARD -->

        <div class="limit-card">

            <div class="limit-left">

                <div class="limit-icon">

                    <i class='bx bx-wallet'></i>

                </div>

                <div class="limit-info">

                    <small>Total Limit Budget</small>

                    <h2>

                        Rp {{ number_format($budget->total_limit ?? 0,0,',','.') }}

                    </h2>

                    <p>

                        {{ $budget->deskripsi ?? 'Belum ada limit budget' }}

                    </p>

                </div>

            </div>

            <div class="limit-right">

                <div class="limit-top">

                    <div>

                        <small>Sisa Limit Budget</small>

                        <h2 class="{{ $sisaLimit < 0 ? 'minus' : '' }}">

                            Rp {{ number_format($sisaLimit,0,',','.') }}

                            <span class="limit-percent">

                                @if(($budget->total_limit ?? 0) > 0)

                                    {{ round(($totalPengeluaran / $budget->total_limit) * 100) }}%

                                @else

                                    0%

                                @endif

                            </span>

                        </h2>

                    </div>

                    <button type="button"
                            class="limit-btn"
                            onclick="openModal()">

                        <i class='bx bx-pencil'></i>

                        Ubah Limit

                    </button>

                </div>

                <div class="progress-bar">

                    <div class="progress"
                         style="width:

                         @if(($budget->total_limit ?? 0) > 0)

                            {{ ($totalPengeluaran / $budget->total_limit) * 100 }}%

                         @else

                            0%

                         @endif

                         ">
                    </div>

                </div>

                <p class="limit-desc">

                    Terpakai :
                    Rp {{ number_format($totalPengeluaran,0,',','.') }}

                </p>

            </div>

        </div>

        <!-- STATUS -->

        @if($sisaLimit < 0)

            <div class="status-card">

                <p class="danger-status">

                    Budget Melebihi Limit

                </p>

            </div>

        @else

            <div class="status-card">

                <p class="safe-status">

                    Budget Masih Aman

                </p>

            </div>

        @endif

        <!-- TABLE -->

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Tanggal Diubah</th>
                    <th>Deskripsi</th>
                    <th>Total Limit</th>
                    <th>Sisa Limit</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($item->tanggal_diubah)->format('d-m-Y') }}
                    </td>

                    <td>{{ $item->deskripsi }}</td>

                    <td>
                        Rp {{ number_format($item->total_limit,0,',','.') }}
                    </td>

                    <td>
                        Rp {{ number_format($item->sisa_limit,0,',','.') }}
                    </td>

                    <td>

                        @if($item->status == 'Aktif')

                            <span class="status aktif">
                                Aktif
                            </span>

                        @else

                            <span class="status nonaktif">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" style="text-align:center;">

                        Belum ada data limit budget

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="pagination">

            <p>
                Total {{ $data->count() }} data
            </p>

        </div>

    </div>

</div>

<!-- MODAL EDIT -->

<div class="edit-modal" id="editModal">

    <div class="modal-box">

        <h2>Edit Limit Budget</h2>

        <form action="{{ route('limitbudget.update', $budget->id ?? 0) }}"
              method="POST">

            @csrf

            <div class="form-group">

                <label>Total Limit</label>

                <input
                    type="number"
                    name="total_limit"
                    value="{{ $budget->total_limit ?? '' }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <input
                    type="text"
                    name="deskripsi"
                    value="{{ $budget->deskripsi ?? '' }}"
                    required
                >

            </div>

            <div class="modal-action">

                <button type="button"
                        class="cancel-btn"
                        onclick="closeModal()">

                    Batal

                </button>

                <button type="submit"
                        class="save-btn">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function openModal() {

    document.getElementById('editModal').style.display = 'flex';

}

function closeModal() {

    document.getElementById('editModal').style.display = 'none';

}

</script>

@endsection