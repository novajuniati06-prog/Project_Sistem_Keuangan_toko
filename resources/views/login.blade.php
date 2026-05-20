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

        <form action="/login" method="POST">
        @csrf

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email Anda"
            >

            <label>Kata Sandi</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan kata sandi Anda"
            >

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

        <div class="divider">
            <span>atau masuk dengan</span>
        </div>

        <!-- GOOGLE -->

        <div class="google">

            <button type="button">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/300/300221.png"
                    alt=""
                >

                Google

            </button>

        </div>

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
@endsection