<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Delta Finance</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

    <div class="dashboard-container">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <!-- LOGO -->
            <div class="logo">

                <img src="https://cdn-icons-png.flaticon.com/512/6997/6997662.png" alt="">

                <div class="logo-text">
                    <h2>Delta</h2>
                    <h2>Finance</h2>
                </div>

            </div>

            <!-- MENU -->
            <ul class="menu">

                <li class="active">
                    <i class='bx bx-home-alt'></i>
                    <span>Dashboard</span>
                </li>

                <li>
                    <i class='bx bx-group'></i>
                    <span>Mitra Bisnis</span>
                </li>

                <li>
                    <i class='bx bx-wallet'></i>
                    <span>Akun Keuangan</span>
                </li>

                <li>
                    <i class='bx bx-credit-card'></i>
                    <span>Transaksi Kas</span>
                </li>

                <li>
                    <i class='bx bx-file'></i>
                    <span>Laporan Keuangan</span>
                </li>

            </ul>

        </div>

        <!-- MAIN -->
        <div class="main-content">

            <!-- TOPBAR -->
            <div class="topbar">

                <div class="profile">

                    <div class="profile-header">

                        <i class='bx bx-user'></i>

                        <div class="profile-text">
                            <h4>Nama</h4>
                            <p>Administrator</p>
                        </div>

                        <i class='bx bx-chevron-down'></i>

                    </div>

                    <!-- DROPDOWN -->
                    <div class="dropdown-menu">

                        <a href="login">
                            <i class='bx bx-log-out'></i>
                            Logout
                        </a>

                    </div>

                </div>

            </div>

            <!-- CONTENT -->
            <div class="content">

                <h1>
                    Welcome back,
                    <span>(nama)</span> !
                </h1>

                <!-- CARD -->
                <div class="cards">

                    <div class="card">

                        <div class="card-top">

                            <div class="icon">
                                <i class='bx bx-line-chart'></i>
                            </div>

                            <p>
                                Transaksi Keluar Hari ini
                            </p>

                        </div>

                        <h2>Rp. -</h2>

                    </div>

                    <div class="card">

                        <div class="card-top">

                            <div class="icon">
                                <i class='bx bx-envelope'></i>
                            </div>

                            <p>
                                Transaksi Masuk Hari ini
                            </p>

                        </div>

                        <h2>Rp. -</h2>

                    </div>

                    <div class="card">

                        <div class="card-top">

                            <div class="icon">
                                <i class='bx bx-wallet'></i>
                            </div>

                            <p>
                                Total Transaksi Hari ini
                            </p>

                        </div>

                        <h2>Rp. -</h2>

                    </div>

                    <div class="card">

                        <div class="card-top">

                            <div class="icon">
                                <i class='bx bx-credit-card'></i>
                            </div>

                            <p>
                                Total Transaksi Keseluruhan
                            </p>

                        </div>

                        <h2>Rp. -</h2>

                    </div>

                </div>

                <!-- CHART -->
                <div class="chart-box">

                    <h3>Ringkasan Bulan ini</h3>

                    <div class="legend">

                        <div class="legend-item">

                            <div class="circle green"></div>

                            <span>Transaksi Masuk</span>

                        </div>

                        <div class="legend-item">

                            <div class="circle pink"></div>

                            <span>Transaksi Keluar</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>