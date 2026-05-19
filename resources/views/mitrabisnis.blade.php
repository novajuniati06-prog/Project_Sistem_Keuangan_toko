<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Bisnis</title>

    <link rel="stylesheet" href="{{ asset('css/mitrabisnis.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
            <div class="logo-text">
                <h2>Delta</h2>
                <h2>Finance</h2>
            </div>
        </div>

        <ul class="menu">
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    Dashboard
                </a>
            </li>

            <li class="active">
                <a href="#">
                    <i class='bx bx-group'></i>
                    Mitra Bisnis
                </a>
            </li>

            <li>
                <a href="#">
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
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <div></div>

            <div class="profile">
                <i class='bx bx-user'></i>

                <div class="profile-text">
                    <h4>Nama</h4>
                    <p>Administrator</p>
                </div>

                <i class='bx bx-chevron-down'></i>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="content">

            <h1>Mitra Bisnis</h1>

            <!-- ACTION -->
            <div class="action-bar">

                <button class="btn-add">
                    <i class='bx bx-plus'></i>
                    Tambah
                </button>

                <div class="search-box">
                    <i class='bx bx-menu'></i>

                    <input type="text" placeholder="Cari Mitra Bisnis">

                    <i class='bx bx-search'></i>
                </div>

            </div>

            <!-- TABLE -->
            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>Informasi Kontak</th>
                            <th>Status Mitra</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>PT ABC</td>
                            <td>Sei panas</td>
                            <td>+62 877 8120 8594</td>
                            <td>Vendor</td>

                            <td class="action-buttons">

                                <button class="edit">
                                    <i class='bx bx-pencil'></i>
                                </button>

                                <button class="delete">
                                    <i class='bx bx-trash'></i>
                                </button>

                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="pagination">

                <p>Menampilkan 1 dari 2 entri</p>

                <div class="pages">
                    <button class="active-page">1</button>
                    <button>2</button>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>