<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Sistem Informasi Alumni</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js'])
</head>
<body class="login-page">
    <main class="container-fluid min-vh-100 d-flex align-items-center justify-content-center px-3 py-4">
        <div class="card login-card p-4 p-md-5" style="width: min(100%, 420px);">
            <div class="text-center mb-4">
                <div class="login-logo mx-auto d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
            </div>

            <div class="text-center mb-4">
                <h1 class="login-title mb-1">Sistem Informasi Alumni</h1>
                <p class="login-subtitle mb-0">SMA Bina Warga 1 Palembang</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">NIS/NISN</label>
                    <input id="username"
                           type="text"
                           class="form-control @error('username') is-invalid @enderror"
                           name="username"
                           value="{{ old('username') }}"
                           placeholder="Masukkan NIS/NISN"
                           required
                           autofocus>
                    @error('username')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input id="password"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               placeholder="Masukkan password"
                               required>
                        <button class="btn password-toggle" type="button" data-password-toggle aria-label="Tampilkan password">
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>
            </form>

            <div class="text-center mt-4">
                <span class="text-secondary">Belum memiliki akun?</span>
                <a href="{{ route('register') }}" class="register-link ms-1">Daftar</a>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('[data-password-toggle]');
            const passwordInput = document.getElementById('password');

            if (toggleButton && passwordInput) {
                toggleButton.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);
                    this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan password');
                });
            }
        });
    </script>
</body>
</html>
