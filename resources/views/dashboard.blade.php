<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>

        <div class="menu">

            <a href="#" class="active">Dashboard</a>
            <a href="#">Vendor</a>
            <a href="#">Customer</a>
            <a href="#">Piutang</a>
            <a href="#">Produk</a>
            <a href="#">Stok</a>
            <a href="#">Invoice</a>
            <a href="#">Transaksi Kas</a>

        </div>

        <div class="bottom-menu">
            <a href="#"><i class="fa-solid fa-gear"></i> Pengaturan</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>

    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <h1>Welcome back, (nama) !</h1>

            <div class="profile">
                <i class="fa-regular fa-user"></i>

                <div>
                    <h4>Nama</h4>
                    <p>Administrator</p>
                </div>

                <i class="fa-solid fa-chevron-down"></i>
            </div>

        </div>

        <!-- CARDS -->
        <div class="cards">

            <div class="card">
                <div class="card-top">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Transaksi Keluar Hari ini</span>
                </div>

                <h2>Rp. -</h2>
            </div>

            <div class="card">
                <div class="card-top">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Transaksi Masuk Hari ini</span>
                </div>

                <h2>Rp. -</h2>
            </div>

            <div class="card">
                <div class="card-top">
                    <i class="fa-solid fa-wallet"></i>
                    <span>Total Transaksi Hari ini</span>
                </div>

                <h2>Rp. -</h2>
            </div>

            <div class="card">
                <div class="card-top">
                    <i class="fa-solid fa-wallet"></i>
                    <span>Total Transaksi Keseluruhan</span>
                </div>

                <h2>Rp. -</h2>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="content-grid">

            <div class="box">
                <h3>Customer</h3>

                <div class="row">
                    <span>Jumlah Customer</span>
                    <span>10</span>
                </div>

                <div class="row">
                    <span>Rata Rata permintaan</span>
                    <span>1000/cust</span>
                </div>

                <div class="row bottom">
                    <span>Terakhir Diedit</span>
                    <span>1/1/2026</span>
                </div>
            </div>

            <div class="box">
                <h3>Piutang</h3>

                <div class="row">
                    <span>Total Piutang</span>
                    <span>Rp -</span>
                </div>

                <div class="row">
                    <span>Total Jatuh Tempo terdekat (1 bulan)</span>
                    <span>Rp -</span>
                </div>

                <div class="row bottom">
                    <span>Terakhir Diedit</span>
                    <span>1/1/2026</span>
                </div>
            </div>

            <div class="box">
                <h3>Kategori Pengeluaran</h3>

                <div class="row">
                    <span>Saldo Awal</span>
                    <span>Rp -</span>
                </div>

                <div class="row">
                    <span>Total Masuk</span>
                    <span>Rp -</span>
                </div>

                <div class="row">
                    <span>Total Keluar</span>
                    <span>Rp -</span>
                </div>

                <div class="row bottom">
                    <span>Saldo Akhir</span>
                    <span>Rp -</span>
                </div>
            </div>

            <div class="box">
                <h3>Stok dan Produk</h3>

                <div class="row">
                    <span>Total Produk</span>
                    <span>156</span>
                </div>

                <div class="row">
                    <span>Stok Menipis</span>
                    <span>12 Produk</span>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>