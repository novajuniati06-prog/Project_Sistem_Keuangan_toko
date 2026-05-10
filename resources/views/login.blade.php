<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Uang TokoKita</title>
    
    <link rel="stylesheet" href="{{'css/login.css' }}">

</head>
<body>

<div class="container">

    <!-- LEFT -->
    <div class="left-panel">
        <h1>Uang TokoKita</h1>

        <!-- <img src="{{ asset('images/login-illustration.png') }}" alt="Illustration"> -->
    </div>

    <!-- RIGHT -->
    <div class="right-panel">

        <div class="icon-circle">
            🔒
        </div>

        <h3>Selamat Datang !</h3>
        <p>Login untuk melanjutkan dan kelola keuangan Anda!</p>

        <form action="/login" method="POST">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email Anda">
            </div>

            <div class="input-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" placeholder="Masukkan kata sandi Anda">
            </div>

            <div class="options">
                <div>
                    <input type="checkbox">
                    <span>Ingat saya</span>
                </div>

                <a href="#">Lupa kata sandi?</a>
            </div>

            <button type="submit" >Login</button>

            <div class="divider">
                <span>atau masuk dengan</span>
            </div>

        </form>

    </div>

</div>

</body>
</html>