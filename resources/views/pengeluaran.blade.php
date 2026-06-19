@extends('layouts.add')

@section('title', 'Transaksi Kas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/transaksikas.css') }}">
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

            <li class="active">
                <a href="{{ route('pengeluaran') }}">
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

        <h1 class="title pengeluaran-title">
            Transaksi Kas Pengeluaran
        </h1>

        <!-- TOP ACTION -->

       @if($budget)

    @if($persentaseBudget >= 80 && $persentaseBudget < 100)

        <div class="budget-card-alert warning">

            <div class="alert-icon">

                <i class='bx bxs-error'></i>

            </div>

            <div class="alert-info">

                <h4>Budget Hampir Habis!</h4>

                <p>
                    Budget sudah terpakai
                    {{ round($persentaseBudget) }}%
                </p>

            </div>

        </div>

    @elseif($persentaseBudget >= 100)

        <div class="budget-card-alert danger">

            <div class="alert-icon">

                <i class='bx bxs-error'></i>

            </div>

            <div class="alert-info">

                <h4>Limit Budget Terlewati!</h4>

                <p>
                    Over budget
                    Rp {{ number_format(abs($sisaLimit),0,',','.') }}
                </p>

            </div>

        </div>

    @endif

@endif

        <div class="top-action">

            <div class="left-action">

                <!-- TAB -->

                <div class="tabs">

                    <a href="{{ route('pemasukan') }}" class="tab-btn">

                        <i class='bx bx-up-arrow-alt pemasukan-icon'></i>

                        Pemasukan

                    </a>

                    <a href="{{ route('pengeluaran') }}" class="tab-btn active">

                        <i class='bx bx-down-arrow-alt pengeluaran-icon'></i>

                        Pengeluaran

                    </a>

                </div>

                <!-- SEARCH -->

                <form method="GET" action="{{ route('pengeluaran') }}">

    <div class="search-box">

        <i class='bx bx-search'></i>

        <input
            type="text"
            name="search"
            id="searchInput"
            placeholder="Cari"
            value="{{ request('search') }}"
        >

        <span
            id="clearSearch"
            onclick="clearSearchInput()"
            style="cursor:pointer;"
        >
            <i class='bx bx-x'></i>
        </span>

    </div>

</form>

            </div>

            <!-- FILTER -->

          <button
    type="button"
    class="filter-btn"
    onclick="openFilterModal()"
>

    <i class='bx bx-filter-alt'></i>

    Filter

</button>

        </div>

        <!-- TABLE -->

        <div class="table-wrapper">

            <table class="pengeluaran-table">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Nominal Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                        </td>

                        <td>{{ $item->keterangan }}</td>

                        <td>
                            Rp {{ number_format($item->nominal_bayar,0,',','.') }}
                        </td>

                        <td>{{ $item->metode_pembayaran }}</td>

                        <td>

                            <div class="aksi">

                                <!-- EDIT -->

                                <button
    class="edit"
    onclick="openEditModal(
        '{{ $item->id }}',
        '{{ $item->tanggal }}',
        '{{ $item->keterangan }}',
        '{{ $item->nominal_bayar }}',
        '{{ $item->metode_pembayaran }}'
    )"
>
    <i class='bx bxs-pencil'></i>
</button>

                                <!-- DELETE -->

                                <button class="delete"
                                onclick="showDeleteModal('{{ route('transaksi.delete', $item->id) }}')">

                                    <i class='bx bxs-trash'></i>

                                </button>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" style="text-align:center;">
                            Belum ada data pengeluaran
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- BOTTOM ACTION -->

        <div class="bottom-action">

            <button
    type="button"
    class="add-btn"
    onclick="openTambahPengeluaran()"
>

    <i class='bx bx-plus'></i>

    Tambah

</button>

        </div>

        <!-- PAGINATION -->

        <div class="pagination">

            <p>
                Total Data : {{ $data->count() }}
            </p>

        </div>

    </div>

</div>

<!-- MODAL DELETE -->

<div class="delete-modal" id="deleteModal">

    <div class="modal-box">

        <i class='bx bxs-error-circle modal-icon'></i>

        <h2>Hapus Data?</h2>

        <p>
            Data transaksi yang dihapus tidak bisa dikembalikan.
        </p>

        <div class="modal-action">

            <button class="cancel-btn" onclick="closeModal()">

                Batal

            </button>

            <a href="" id="deleteLink" class="confirm-delete">

                Hapus

            </a>

        </div>

    </div>

</div>

<!-- MODAL TAMBAH PENGELUARAN -->

<div class="delete-modal" id="tambahModalPengeluaran">

    <div class="modal-box">

        <h2 style="color: #2563eb;">
            Tambah Pengeluaran
        </h2>

        <form action="{{ route('transaksi.store') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="tipe_transaksi"
                value="Pengeluaran"
            >

            <div class="form-group">

               <input
    type="date"
    name="tanggal"
    required
    class="modal-input"
>

            </div>

           <div class="form-group">

                <input
    type="text"
    name="keterangan"
    placeholder="Keterangan"
    required
    class="modal-input"
>

            </div>

            <div class="form-group">

                <input
    type="number"
    name="nominal_bayar"
    placeholder="Nominal"
    required
    class="modal-input"
>

            </div>

            <div class="form-group">

                <select
                    name="metode_pembayaran"
                    style="width:100%;padding:12px;border-radius:8px;border:1px solid #d1d5db;"
                >

                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>

                </select>

            </div>

            <div class="modal-action">


                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeTambahPengeluaran()"
                >
                    Batal
                </button>

                <button
    type="submit"
    class="save-btn"
>
    Simpan
</button>

            </div>

        </form>

    </div>

</div>

<script>

function showDeleteModal(link){

    document.getElementById('deleteModal').style.display = 'flex';

    document.getElementById('deleteLink').href = link;
}

function closeModal(){

    document.getElementById('deleteModal').style.display = 'none';
}

function openTambahPengeluaran(){

    document.getElementById('tambahModalPengeluaran')
        .style.display = 'flex';
}

function closeTambahPengeluaran(){

    document.getElementById('tambahModalPengeluaran')
        .style.display = 'none';
}

function openEditModal(
    id,
    tanggal,
    keterangan,
    nominal,
    metode
){

    document.getElementById('editModal')
        .style.display = 'flex';

    document.getElementById('editTanggal').value = tanggal;
    document.getElementById('editKeterangan').value = keterangan;
    document.getElementById('editNominal').value = nominal;
    document.getElementById('editMetode').value = metode;

    document.getElementById('editForm').action =
        '/transaksi/update/' + id;
}

function closeEditModal(){

    document.getElementById('editModal')
        .style.display = 'none';
}

function openFilterModal(){

    document.getElementById('filterModal')
        .style.display = 'flex';
}

function closeFilterModal(){

    document.getElementById('filterModal')
        .style.display = 'none';
}

function clearSearchInput(){

    window.location.href =
        "{{ route('pengeluaran') }}";

}

const searchInput =
    document.getElementById('searchInput');

const clearSearch =
    document.getElementById('clearSearch');

clearSearch.style.display =
    searchInput.value ? 'block' : 'none';

searchInput.addEventListener('input', function(){

    clearSearch.style.display =
        this.value ? 'block' : 'none';

});

</script>

<!-- MODAL EDIT -->

<div class="delete-modal" id="editModal">

    <div class="modal-box">

        <h2 style="color:#2563eb;">
            Edit Pengeluaran
        </h2>

        <form id="editForm" method="POST">

            @csrf

           <div class="form-group">
                <input
                    type="date"
                    name="tanggal"
                    id="editTanggal"
                    required
                    style="width:100%;padding:12px;border-radius:8px;border:1px solid #d1d5db;"
                >
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="keterangan"
                    id="editKeterangan"
                    placeholder="Keterangan"
                    required
                    style="width:100%;padding:12px;border-radius:8px;border:1px solid #d1d5db;"
                >
            </div>

            <div class="form-group">
                <input
                    type="number"
                    name="nominal_bayar"
                    id="editNominal"
                    placeholder="Nominal"
                    required
                    style="width:100%;padding:12px;border-radius:8px;border:1px solid #d1d5db;"
                >
            </div>

           <div class="form-group">
                <select
    name="metode_pembayaran"
    id="editMetode"
    class="modal-select"
>
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                </select>
            </div>

            <div class="modal-action">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeEditModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

<!-- MODAL FILTER -->

<div class="delete-modal" id="filterModal">

    <div class="modal-box">

        <h2 style="color:#3366ff;">
            Filter Tanggal
        </h2>

        <form method="GET">

            <div class="form-group">

                <input
                    type="date"
                    name="tanggal_awal"
                    value="{{ request('tanggal_awal') }}"
                    class="modal-input"
                >

            </div>

            <div class="form-group">

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ request('tanggal_akhir') }}"
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
        href="{{ route('pengeluaran') }}"
        class="cancel-btn"
        style="text-decoration:none;"
    >
        Reset
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

@endsection

