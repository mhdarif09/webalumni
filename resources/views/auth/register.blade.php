<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrasi Alumni Baru - Sistem Informasi Alumni SMA Bina Warga 1 Palembang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-page: #F3F4F6;
            --bg-panel: #FFFFFF;
            --bg-panel-soft: #F3F4F6;
            --border-color: #D1D5DB;
            --text-strong: #111827;
            --text-secondary: #6B7280;
            --primary: #1E3A8A;
            --primary-hover: #172E6F;
            --radius: 20px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-strong);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .register-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .register-card {
            width: min(100%, 1120px);
            display: grid;
            grid-template-columns: 35% 65%;
            border-radius: 28px;
            overflow: hidden;
            background: var(--bg-panel);
            box-shadow: 0 32px 80px rgba(17, 24, 39, 0.08);
        }

        .register-sidebar {
            background: var(--bg-panel-soft);
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .sidebar-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at top right, rgba(30, 64, 175, 0.08), transparent 24%),
                              radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.08), transparent 20%);
            pointer-events: none;
        }

        .sidebar-content {
            position: relative;
            z-index: 1;
        }

        .sidebar-logo {
            width: 96px;
            height: 96px;
            border-radius: 24px;
            background: linear-gradient(135deg, #2563eb, #60a5fa);
            display: grid;
            place-items: center;
            margin: 0 auto 1.75rem;
            box-shadow: 0 18px 40px rgba(30, 64, 175, 0.15);
        }

        .sidebar-logo svg {
            width: 48px;
            height: 48px;
            color: white;
        }

        .sidebar-title {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .sidebar-heading {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(1.8rem, 2.3vw, 2.5rem);
            line-height: 1.05;
            font-weight: 700;
            color: var(--text-strong);
            margin-bottom: 1rem;
        }

        .sidebar-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.9;
            max-width: 320px;
            margin-left: auto;
            margin-right: auto;
        }

        .register-panel {
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
        }

        .register-form {
            width: 100%;
            max-width: 520px;
            background: var(--bg-panel);
            border-radius: 24px;
            border: 1px solid rgba(209, 213, 219, 0.75);
            box-shadow: 0 22px 45px rgba(15, 23, 42, 0.06);
            padding: 2.5rem;
        }

        .register-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .register-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: rgba(30, 64, 175, 0.12);
            color: var(--primary);
            font-size: 1.25rem;
        }

        .register-title {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-strong);
        }

        .register-description {
            margin: 0.5rem 0 0;
            color: var(--text-secondary);
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .register-note {
            margin: 0.75rem 0 0;
            color: var(--text-secondary);
            font-size: 0.88rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.35rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-strong);
        }

        .form-control {
            width: 100%;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background: #F9FAFB;
            padding: 1rem 1rem 1rem 3.5rem;
            font-size: 0.95rem;
            color: var(--text-strong);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:hover,
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
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
            color: var(--text-secondary);
            pointer-events: none;
        }

        .input-icon i,
        .input-icon svg {
            display: block;
            line-height: 1;
            width: 1rem;
            height: 1rem;
        }

        .input-group-password {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 1rem;
            padding: 0;
        }

        .form-select {
            border-radius: 12px;
            padding-left: 3.5rem;
            padding-right: 1rem;
        }

        .radio-group {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .radio-wrapper {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.9rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            cursor: pointer;
            transition: border-color 0.2s ease, background 0.2s ease;
            background: #F9FAFB;
        }

        .radio-wrapper input {
            accent-color: var(--primary);
            cursor: pointer;
        }

        .radio-wrapper:hover {
            border-color: var(--primary);
            background: rgba(59, 130, 246, 0.08);
        }

        .submit-row {
            margin-top: 1.5rem;
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 1rem 1.15rem;
            background: var(--primary);
            color: white;
            font-size: 1rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 18px 36px rgba(30, 64, 175, 0.18);
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .login-link {
            margin-top: 1rem;
            display: block;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--primary);
            font-weight: 600;
        }

        .field-error {
            margin-top: 0.5rem;
            color: #dc2626;
            font-size: 0.9rem;
        }

        @media (max-width: 991.98px) {
            .register-card {
                grid-template-columns: 1fr;
            }

            .register-sidebar,
            .register-panel {
                padding: 2rem;
            }
        }

        @media (max-width: 575.98px) {
            .register-shell {
                padding: 1rem;
            }

            .register-sidebar {
                padding: 1.75rem;
            }

            .register-panel {
                padding: 1.75rem;
            }

            .register-card {
                border-radius: 24px;
            }

            .brand-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-shell">
        <div class="register-card">
            <aside class="register-sidebar">
                <div class="sidebar-pattern"></div>
                <div class="sidebar-content">
                    <div class="sidebar-logo">
                        <x-application-logo class="brand-logo" />
                    </div>
                    <div class="sidebar-title">SISTEM INFORMASI ALUMNI</div>
                    <h1 class="sidebar-heading">SMA BINA WARGA 1 PALEMBANG</h1>
                    <p class="sidebar-description">Buat akun alumni Anda untuk mengakses layanan data pribadi, karir, dan informasi alumni secara terpusat.</p>
                </div>
            </aside>

            <section class="register-panel">
                <div class="register-form">
                    <div class="register-header">
                        <div class="register-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <div>
                            <h2 class="register-title">Registrasi Alumni Baru</h2>
                            <p class="register-description">Silakan lengkapi data berikut untuk membuat akun baru pada Sistem Informasi Alumni SMA Bina Warga 1 Palembang.</p>
                            <p class="register-note">Semua data wajib diisi.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <span class="input-icon"><i class="fa-regular fa-user"></i></span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                            @error('name')<div class="field-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">Username / NISN</label>
                            <span class="input-icon"><i class="fa-regular fa-id-badge"></i></span>
                            <input id="username" type="text" name="username" class="form-control" placeholder="Masukkan username atau NISN" value="{{ old('username') }}" required>
                            @error('username')<div class="field-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required>
                            @error('email')<div class="field-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                            <div class="input-group-password">
                                <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                                <button type="button" class="toggle-password" data-target="password"><i class="fa-solid fa-eye"></i></button>
                            </div>
                            @error('password')<div class="field-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                            <div class="input-group-password">
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                                <button type="button" class="toggle-password" data-target="password_confirmation"><i class="fa-solid fa-eye"></i></button>
                            </div>
                            @error('password_confirmation')<div class="field-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="submit-row">
                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-user-plus"></i>
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>

                    <p class="login-link">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk sekarang</a></p>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', () => {
                const target = document.getElementById(button.dataset.target);
                const icon = button.querySelector('i');
                if (target.type === 'password') {
                    target.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    target.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>
</html>
