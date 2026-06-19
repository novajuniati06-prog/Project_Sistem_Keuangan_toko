@extends('layouts.add')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

        <div class="back">

            <a href="{{ route('login') }}">
                <i class='bx bx-arrow-back'></i>
            </a>

        </div>

        <h1>Buat Akun Baru</h1>

        <p class="subtitle">
            Lengkapi data diri Anda untuk membuat akun Delta Finance
        </p>

        <form action="/register" method="POST">
        @csrf

            <!-- NAMA -->

            <label>Nama Lengkap</label>

            <div class="input-box">

                <i class='bx bx-user'></i>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama lengkap Anda"
                >

            </div>
            @error('name')
    <small class="error-text">{{ $message }}</small>
@enderror

            <!-- EMAIL -->

            <label>Email</label>

            <div class="input-box">

                <i class='bx bx-envelope'></i>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan Email Anda"
                >

            </div>
            @error('email')
    <small class="error-text">{{ $message }}</small>
@enderror

           <!-- NO TELEPON -->

<label>No Telepon</label>

<div class="input-box">

    <i class='bx bx-phone'></i>

    <input
    type="text"
    name="phone"
    placeholder="Masukkan nomor telepon"
    required
    minlength="10"
>

@error('phone')

    <small style="color:red;">
        {{ $message }}
    </small>

@enderror

</div>

<!-- NAMA TOKO -->

<label>Nama Toko</label>

<div class="input-box">

    <i class='bx bx-store'></i>

    <input
        type="text"
        name="shop_name"
        placeholder="Masukkan nama toko"
    >

</div>

<!-- ALAMAT TOKO -->

<label>Alamat Toko</label>

<div class="input-box textarea-box">

    <i class='bx bx-map'></i>

    <textarea
        name="shop_address"
        placeholder="Masukkan alamat toko"
    ></textarea>

</div>

            <!-- PASSWORD -->

            <label>Kata Sandi</label>

            <div class="input-box password-box">

    <i class='bx bx-lock'></i>

    <input
        type="password"
        name="password"
        id="password"
        placeholder="Masukkan kata sandi Anda"
    >

    <i class='bx bx-hide eye-icon' id="togglePassword"></i>

</div>
            @error('password')
    <small class="error-text">{{ $message }}</small>
@enderror

            <!-- KONFIRMASI -->

            <label>Konfirmasi Kata Sandi</label>

            <div class="input-box password-box">

    <i class='bx bx-lock'></i>

    <input
        type="password"
        name="password_confirmation"
        id="confirmPassword"
        placeholder="Ulangi kata sandi Anda"
    >

    <i class='bx bx-hide eye-icon' id="toggleConfirmPassword"></i>

</div>
            @error('password_confirmation')
    <small class="error-text">{{ $message }}</small>
@enderror

            <!-- PASSWORD INFO -->

            <div class="password-info">

                <h4>Kata sandi harus mengandung:</h4>

                <p>✔ Minimal 8 karakter</p>
                <p>✔ Mengandung huruf besar dan kecil</p>
                <p>✔ Mengandung angka</p>
                <p>✔ Mengandung simbol (contoh: !@#)</p>

            </div>

            <!-- CHECKBOX -->

            <div class="agree">

                <input type="checkbox">

                <span>
                    Saya setuju dengan
                    <a href="#">Syarat & ketentuan</a>
                    dan
                    <a href="#">Kebijakan Privasi</a>
                </span>

            </div>

            <!-- BUTTON -->

            <button type="submit">
                Daftar
            </button>

        </form>

    </div>

</div>

@endsection

@section('js')
<script src="{{ asset('js/register.js') }}"></script>
@endsection