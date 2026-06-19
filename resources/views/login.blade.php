@extends('layouts.add')

@section('title', 'Login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="container">

    <!-- LEFT -->

    <div class="left">

        <div class="logo">

            <h1>
                Delta <br>
                Finance
            </h1>

            <p>
                Kelola keuangan bisnis Anda <br>
                lebih mudah, aman, dan efisien
            </p>

        </div>

        <img src="{{ asset('image/img.png') }}" class="illustration">

    </div>

    <!-- RIGHT -->

    <div class="right">

        <div class="icon">
            <i class='bx bxs-lock'></i>
        </div>

        <h1>Selamat Datang !</h1>

        <p>
            Login untuk melanjutkan dan kelola keuangan Anda!
        </p>

        @if(session('error'))

    <div class="error-message">

        {{ session('error') }}

    </div>

@endif

        <form action="/login" method="POST">
        @csrf

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email Anda"
            >

           <label>Kata Sandi</label>

<div class="password-box">

    <input
        type="password"
        name="password"
        id="password"
        placeholder="Masukkan kata sandi Anda"
    >

    <i class='bx bx-hide toggle-password' id="togglePassword"></i>

</div>

            <div class="remember">

                <div class="check">

                    <input type="checkbox">

                    <span>Ingat saya</span>

                </div>

                <a href="#">
                    Lupa kata sandi?
                </a>

            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <!-- DIVIDER -->

        <!-- <div class="divider">
            <span>atau masuk dengan</span>
        </div> -->

        <!-- REGISTER -->

        <p class="register">

            Belum punya akun?

            <a href="{{ route('register') }}">
                Klik disini
            </a>

        </p>

    </div>

</div>

@endsection

@section('js')
<script src="{{ asset('js/login.js') }}"></script>

<!-- <script>
    window.history.forward();
</script> -->
@endsection