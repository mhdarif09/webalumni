<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Informasi Alumni SMA Bina Warga 1 Palembang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --page-bg: #f8fafc;
            --panel-bg: #ffffff;
            --panel-alt: #eeeeee;
            --border-light: #dbeafe;
            --text-dark: #0f172a;
            --text-medium: #475569;
            --text-muted: #64748b;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-soft: rgba(37, 99, 235, 0.12);
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #eff6ff 0%, #f8fafc 100%);
            color: var(--text-dark);
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: min(100%, 1120px);
            gap: 2rem;
            background: var(--panel-bg);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 40px 100px rgba(15, 23, 42, 0.12);
        }

        .auth-side {
            background: var(--panel-alt);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 2rem;
        }

        .brand-box {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.15rem;
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid rgba(37, 99, 235, 0.15);
            width: fit-content;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #2563eb, #60a5fa);
            color: white;
            overflow: hidden;
        }

        .brand-icon .brand-logo {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: inherit;
        }

        .brand-label {
            margin: 0;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--primary);
        }

        .brand-title {
            margin: 0;
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 3vw, 3.5rem);
            line-height: 1.02;
            font-weight: 800;
            color: var(--text-dark);
        }

        .brand-text {
            margin: 0;
            font-size: 1rem;
            line-height: 1.9;
            color: var(--text-medium);
            max-width: 520px;
        }

        .login-side {
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-panel {
            width: 100%;
            max-width: 440px;
            border-radius: 28px;
            border: 1px solid rgba(148, 163, 184, 0.18);
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.08);
            padding: 2.25rem;
            background: var(--panel-bg);
        }

        .login-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .login-avatar {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: var(--primary-soft);
            color: var(--primary);
        }

        .login-title {
            margin: 0;
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .login-subtitle {
            margin: 0.35rem 0 0;
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.75;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.65rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            border-radius: 16px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            color: var(--text-dark);
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
            background: #ffffff;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1.5rem;
            height: 1.5rem;
            display: grid;
            place-items: center;
            color: #94a3b8;
            pointer-events: none;
        }

        .input-icon svg {
            display: block;
            line-height: 1;
            width: 1rem;
            height: 1rem;
        }

        .action-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .forgot-link {
            color: var(--primary);
            font-size: 0.92rem;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-primary {
            width: 100%;
            border: none;
            border-radius: 16px;
            padding: 1rem;
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.18);
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }

        .login-note {
            margin-top: 1.5rem;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .login-note a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .alert-box {
            border-radius: 18px;
            border: 1px solid rgba(239, 68, 68, 0.25);
            background: rgba(254, 226, 226, 0.65);
            color: #991b1b;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 991.98px) {
            .auth-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575.98px) {
            .page-shell {
                padding: 1rem;
            }

            .auth-side,
            .login-side {
                padding: 1.5rem;
            }

            .brand-title {
                font-size: 2.25rem;
            }

            .login-panel {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <main class="page-shell">
        <div class="auth-card">
            <section class="auth-side">
                <div class="brand-box">
                    <div class="brand-icon">
                        <x-application-logo class="brand-logo" />
                    </div>
                    <div>
                        <p class="brand-label">SISTEM INFORMASI ALUMNI</p>
                    </div>
                </div>
                <h1 class="brand-title">Sistem Informasi Alumni SMA Bina Warga 1 Palembang</h1>
                <p class="brand-text">Masuk menggunakan email dan password yang sama untuk Admin dan Alumni. Sistem akan otomatis mengarahkan Anda ke dashboard sesuai peran.</p>
            </section>

            <section class="login-side">
                <div class="login-panel">
                    <div class="login-header">
                        <div class="login-avatar">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 20C4 16.6863 6.68629 14 10 14H14C17.3137 14 20 16.6863 20 20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="login-title">Login</h2>
                            <p class="login-subtitle">Masukkan email dan password anda untuk masuk ke sistem. Akses untuk semua pengguna.</p>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert-box">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert-box">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <span class="input-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 7.5V18C3 19.1046 3.89543 20 5 20H19C20.1046 20 21 19.1046 21 18V7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 7.5L12 13.5L21 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <input id="username" type="text" name="username" class="form-control" placeholder="Masukkan email atau NIS/NISN" required autofocus>
                        </div>

                        <div class="form-group">
                            <div class="action-row">
                                <label for="password" class="form-label">Password</label>
                                <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password ?</a>
                            </div>
                            <span class="input-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10V8C6 5.79086 7.79086 4 10 4H14C16.2091 4 18 5.79086 18 8V10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5 10H19C20.1046 10 21 10.8954 21 12V18C21 19.1046 20.1046 20 19 20H5C3.89543 20 3 19.1046 3 18V12C3 10.8954 3.89543 10 5 10Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14V17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.5 20H13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan Password anda" required>
                        </div>

                        <button type="submit" class="btn-primary">
                            Masuk
                            <span class="btn-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </button>
                    </form>

                    <p class="login-note">Belum punya akun? <a href="{{ route('register') }}">Registrasi Alumni</a></p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
