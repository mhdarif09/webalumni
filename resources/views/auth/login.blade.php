<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Sistem Pendataan Alumni</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind / Custom Styles base on project config -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-navy: #34495E;
            --primary-navy-dark: #2C3E50;
            --accent-color: #3b82f6;
            --bg-light: #F8FAFC;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            display: flex;
            min-height: 100vh;
        }

        .split-layout {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        /* Left Side: Branding / Visual */
        .split-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-navy) 0%, var(--primary-navy-dark) 100%);
            color: white;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .split-left::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .split-left::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .brand-logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 10;
        }

        .brand-logo-icon {
            width: 40px;
            height: 40px;
            background: white;
            color: var(--primary-navy);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .hero-text {
            z-index: 10;
        }

        .hero-text h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .hero-text p {
            font-size: 1.2rem;
            opacity: 0.8;
            max-width: 500px;
            line-height: 1.6;
            font-weight: 300;
        }

        .footer-text {
            font-size: 0.85rem;
            opacity: 0.5;
            z-index: 10;
        }

        /* Right Side: Login Form */
        .split-right {
            flex: 1;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
        }

        .login-header {
            margin-bottom: 2.5rem;
        }

        .login-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-navy);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(52, 73, 94, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 0.875rem;
            background-color: var(--primary-navy);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background-color: var(--primary-navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(52, 73, 94, 0.3);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
            cursor: pointer;
        }

        .link-forgot {
            color: var(--primary-navy);
            text-decoration: none;
            font-weight: 600;
        }

        .link-forgot:hover {
            text-decoration: underline;
        }

        .register-prompt {
            text-align: center;
            margin-top: 2.5rem;
            font-size: 0.9rem;
            color: #64748b;
        }

        .register-prompt a {
            color: var(--primary-navy);
            font-weight: 600;
            text-decoration: none;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            border: 1px solid #fca5a5;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            .split-left {
                display: none;
            }
            .split-right {
                background-color: var(--bg-light);
            }
            .login-container {
                background: white;
                border-radius: 1.5rem;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            }
        }
    </style>
</head>
<body>

    <div class="split-layout">
        <!-- Left Side -->
        <div class="split-left">
            <div class="brand-logo">
                <div class="brand-logo-icon">🏢</div>
                <span>SMA BW 1</span>
            </div>

            <div class="hero-text">
                <h1>Sistem Pendataan Alumni</h1>
                <p>Silakan masuk menggunakan akun Anda untuk memperbarui data diri, terhubung dengan sekolah, dan menjaga tali persaudaraan antar angkatan.</p>
            </div>

            <div class="footer-text">
                &copy; {{ date('Y') }} SMA Bina Warga 1 Palembang. Seluruh Hak Cipta Dilindungi.
            </div>
        </div>

        <!-- Right Side Form -->
        <div class="split-right">
            <div class="login-container">
                <div class="login-header">
                    <h2>Masuk Akun</h2>
                    <p>Masukkan email dan kata sandi Anda untuk melanjutkan.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@email.com">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-options">
                        <label for="remember_me" class="checkbox-label">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="link-forgot" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn-submit">Masuk Sekarang</button>
                    </div>
                </form>

                <div class="register-prompt">
                    Belum terdata sebagai alumni? 
                    <a href="{{ route('register') }}">Registrasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
