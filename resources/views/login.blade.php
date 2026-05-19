<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Delta Finance Login</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="container">

    <!-- LEFT -->
    <div class="left">

      <div class="logo-text">
        <h1>Delta<br>Finance</h1>

        <div class="line"></div>

        <p>
          Kelola keuangan bisnis Anda<br>
          lebih mudah, aman, dan efisien
        </p>
      </div>

      <div class="illustration">
        <img src="{{ asset('image/img.png') }}" alt="finance illustration">
      </div>

    </div>


    <!-- RIGHT -->
    <div class="right">

      <div class="login-box">

       <div class="lock-icon">
  <i class="fa-solid fa-lock"></i>
      </div>

        <h2>Selamat Datang !</h2>

        <p class="subtitle">
          Login untuk melanjutkan dan kelola keuangan Anda!
        </p>

        <form>

          <div class="input-group">
            <label>Email</label>
            <input type="email" placeholder="Masukkan email Anda">
          </div>

          <div class="input-group">
            <label>Kata Sandi</label>
            <input type="password" placeholder="Masukkan kata sandi Anda">
          </div>

          <div class="options">
            <div class="remember">
              <input type="checkbox">
              <span>Ingat saya</span>
            </div>

            <a href="#">Lupa kata sandi?</a>
          </div>

          <button type="submit" class="login-btn">
            Login
          </button>

        </form>

        <div class="divider">
          <span>atau masuk dengan</span>
        </div>

        <button class="google-btn">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="">
          Google
        </button>

        <p class="signup">
          Belum punya akun?
          <a href="register">Klik disini</a>
        </p>

      </div>

    </div>

  </div>

</body>
</html>