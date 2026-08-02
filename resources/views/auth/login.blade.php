<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bank Sampah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #10362a;
            overflow-x: hidden;
        }

        /* ===== LEFT HERO PANEL ===== */
        .hero {
            position: relative;
            flex: 1 1 55%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 70px;
            color: #fff;
            overflow: hidden;

            background:
                linear-gradient(rgba(16, 30, 24, .82), rgba(16, 54, 42, .82)),
                url("{{ asset('images/fotobanksampah.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-brand {
            position: absolute;
            top: 40px;
            left: 70px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .hero-brand .brand-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(145deg, #2f6b50, #10362a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 18px rgba(16, 54, 42, .4);
        }

        .hero-brand h3 {
            font-size: 18px;
            font-weight: 700;
        }

        .hero-brand span {
            display: block;
            font-size: 12px;
            font-weight: 300;
            color: #d7e5dd;
        }

        .hero-content {
            max-width: 560px;
            z-index: 1;
        }

        .hero-content .eyebrow {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 4px;
            color: #eef3ef;
        }

        .hero-content h1 {
            font-size: 52px;
            line-height: 1.1;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-content h1 span {
            color: #7ed6a0;
        }

        .hero-divider {
            width: 60px;
            height: 4px;
            background: #d9a63c;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .hero-content p {
            font-size: 16px;
            font-weight: 300;
            line-height: 1.6;
            color: #e4ece7;
            margin-bottom: 40px;
        }

        .hero-features {
            display: flex;
            gap: 28px;
        }

        .hero-feature {
            text-align: center;
            max-width: 100px;
        }

        .hero-feature .icon-circle {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, .3);
            background: rgba(255, 255, 255, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #cdeedb;
        }

        .hero-feature p {
            margin: 0;
            font-size: 13px;
            font-weight: 500;
            color: #eef3ef;
        }

        /* ===== RIGHT LOGIN PANEL ===== */
        .login-panel {
            flex: 1 1 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            background: #10362a;
        }

        .container {
            width: 100%;
            max-width: 430px;

            background: rgba(251, 248, 241, .96);

            border: 1px solid rgba(255, 255, 255, .15);
            border-radius: 14px;

            padding: 42px;

            box-shadow: 0 25px 60px rgba(0, 0, 0, .28);
        }

        .logo {
            width: 72px;
            height: 72px;

            margin: auto;
            margin-bottom: 24px;

            display: flex;
            justify-content: center;
            align-items: center;

            border-radius: 12px;

            color: #fff;
            font-size: 30px;

            background: linear-gradient(145deg, #2f6b50, #10362a);

            box-shadow: 0 10px 25px rgba(16, 54, 42, .35);
        }

        h2 {
            text-align: center;
            color: #10362a;
            margin-bottom: 6px;
            font-size: 32px;
        }

        p.subtitle {
            text-align: center;
            color: #5f6b60;
            margin-bottom: 28px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error ul {
            margin-left: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #10362a;
        }

        .input-box {
            position: relative;
        }

        .input-box input {
            width: 100%;

            padding: 14px 46px 14px 16px;

            border: 1px solid #d9d3c4;

            border-radius: 10px;

            background: #fff;

            outline: none;

            transition: .25s;
        }

        .input-box input:focus {
            border-color: #2f6b50;
            box-shadow: 0 0 0 4px rgba(31, 92, 74, .12);
        }

        .input-box i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #7d8a80;
        }

        #togglePassword {
            cursor: pointer;
            color: #777;
            transition: .25s;
        }

        #togglePassword:hover {
            color: #1f5c4a;
        }

        .remember {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
            font-size: 14px;
        }

        .remember label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-weight: 500;
        }

        .remember a {
            color: #b6902a;
            text-decoration: none;
            font-weight: 600;
        }

        .remember a:hover {
            color: #8c6a17;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #1f5c4a;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 12px 24px rgba(16, 54, 42, .25);
        }

        button:hover {
            background: #10362a;
            transform: translateY(-2px);
        }

        .register {
            margin-top: 26px;
            text-align: center;
            color: #5f6b60;
        }

        .register a {
            color: #b6902a;
            text-decoration: none;
            font-weight: 700;
        }

        .register a:hover {
            color: #8c6a17;
        }

        /* ===== RESPONSIVE ===== */

        /* Tablet: perkecil hero, tetap 2 kolom */
        @media (max-width: 1024px) {
            .hero {
                padding: 50px 40px;
            }

            .hero-brand {
                left: 40px;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .hero-features {
                gap: 18px;
            }
        }

        /* HP / layar sempit: hero disembunyikan, hanya form login yang tampil, full width & center */
        @media (max-width: 860px) {
            body {
                display: block;
            }

            .hero {
                display: none;
            }

            .login-panel {
                min-height: 100vh;
                padding: 24px 16px;
            }

            .container {
                max-width: 100%;
                padding: 30px 24px;
                border-radius: 16px;
            }

            h2 {
                font-size: 26px;
            }
        }

        @media (max-width: 380px) {
            .container {
                padding: 24px 18px;
            }

            .logo {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }
    </style>

</head>
<body>

    <!-- ===== LEFT: HERO / BRANDING ===== -->
    <div class="hero">
        <div class="hero-brand">
            <div class="brand-icon">
                <i class="fas fa-recycle"></i>
            </div>
            <div>
                <h3>Bank Sampah Lestari</h3>
                <span>Kelola Sampah, Jadi Berkah</span>
            </div>
        </div>

        <div class="hero-content">
            <p class="eyebrow">Selamat Datang di</p>
            <h1>Bank Sampah<br><span>Lestari</span></h1>
            <div class="hero-divider"></div>
            <p>
                Kelola sampah dengan mudah, tukar poin, dan dapatkan
                manfaatnya untuk lingkungan yang lebih bersih.
            </p>

            <div class="hero-features">
                <div class="hero-feature">
                    <div class="icon-circle"><i class="fas fa-leaf"></i></div>
                    <p>Lingkungan Bersih</p>
                </div>
                <div class="hero-feature">
                    <div class="icon-circle"><i class="fas fa-gift"></i></div>
                    <p>Tukar Poin Berhadiah</p>
                </div>
                <div class="hero-feature">
                    <div class="icon-circle"><i class="fas fa-users"></i></div>
                    <p>Komunitas Peduli</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== RIGHT: LOGIN FORM ===== -->
    <div class="login-panel">
        <div class="container">

            <div class="logo">
                <i class="fas fa-recycle"></i>
            </div>

            <h2>Login</h2>
            <p class="subtitle">Masuk ke akun Bank Sampah</p>

            @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>

                    <div class="input-box">
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan Email"
                            required
                            autofocus>

                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <div class="input-box">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan Password"
                            required>

                        <i id="togglePassword" class="fa-solid fa-eye"></i>

                    </div>
                </div>

                <div class="remember">

                    <label>
                        <input type="checkbox" name="remember">
                        Ingat Saya
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                    @endif

                </div>

                <button type="submit">
                    <i class="fas fa-right-to-bracket"></i>
                    Login
                </button>

            </form>

            <div class="register">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Daftar Sekarang
                </a>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function () {
                if (password.type === 'password') {
                    password.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    password.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    </script>

</body>

</html>