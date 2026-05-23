<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Website Alumni SMA Bina Warga 1 Palembang</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-navy: #34495E;
            --primary-navy-light: #455A64;
            --accent-navy: #34495E;
            --accent-navy-hover: #2C3E50;
            --bg-navy-medium: #34495E; /* Medium Navy / Wet Asphalt */
            --bg-navy-dark: #2C3E50;
            --bg-light: #f8fafc;
            --text-white: #ffffff;
            --text-light: #f1f5f9;
            --text-muted-light: #cbd5e1;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-navy-medium);
            color: var(--text-white);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .navbar-brand {
            font-family: 'Outfit', sans-serif;
        }

        .navbar {
            padding: 1.25rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-navy) !important;
            letter-spacing: -0.025em;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.5rem;
        }

        .nav-link:hover {
            color: var(--primary-navy) !important;
        }

        .hero {
            padding: 100px 0 80px;
            background: radial-gradient(circle at 100% 0%, rgba(255, 255, 255, 0.05) 0%, transparent 40%);
        }

        .hero-tagline {
            color: var(--text-white);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .hero h1 {
            font-size: 3.5rem;
            line-height: 1.1;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-muted-light);
            line-height: 1.6;
            max-width: 540px;
            margin-bottom: 2.5rem;
        }

        .btn-primary {
            background-color: var(--primary-navy);
            border-color: var(--primary-navy);
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-navy-light);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.3);
        }

        .btn-navy {
            background-color: var(--primary-navy);
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }

        .btn-navy:hover {
            background-color: var(--accent-navy-hover);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.3);
        }

        /* Modern Login Card */
        .login-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            background: white;
            padding: 2.5rem;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-navy);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.2);
        }

        .feature-card {
            border: none;
            border-radius: 1.25rem;
            background: white;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(30, 58, 138, 0.1);
            color: var(--primary-navy);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        footer {
            background-color: var(--bg-navy-dark);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 4rem 0 2rem;
        }

        .footer-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: var(--text-white);
            font-size: 1.25rem;
            margin-bottom: 1rem;
            display: block;
        }

        [x-cloak] { display: none !important; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        @auth
            <a class="navbar-brand" href="#">Alumni Bina Warga 1 Palembang</a>
        @else
            <a class="navbar-brand" href="#">Sistem Informasi Alumni</a>
        @endauth
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @auth
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="nav-item ms-lg-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light px-4 py-2" style="border-radius: 0.75rem;">Keluar</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Bantuan</a></li>
                    <li class="nav-item ms-lg-3">
                        <button @click="loginOpen = true; $nextTick(() => document.getElementById('email').focus())" class="btn btn-navy px-4 py-2 border border-white">Login Member</button>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero overflow-hidden" x-data="{ loginOpen: false }">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Side: Copywriting -->
            <div class="col-lg-7" :class="loginOpen && 'd-none d-lg-block'">
                <div class="hero-tagline">Sistem Terpusat Database Alumni</div>
                <h1>Portal Pendataan <br class="d-none d-md-block"> Alumni SMA Bina Warga 1 Palembang</h1>
                <p>Selamat datang di pusat pendataan resmi alumni SMA Bina Warga 1. Bantu sekolah melengkapi data lulusan untuk menjaga tali silaturahmi antar angkatan.</p>
                <div class="d-flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-navy px-5 border border-white border-opacity-25">Masuk ke Dashboard Saya</a>
                    @else
                        <button @click="loginOpen = true; $nextTick(() => document.getElementById('email').focus())" class="btn btn-navy px-5 border border-white border-opacity-25">Masuk Sekarang</button>
                        <a href="{{ route('register') }}" class="btn btn-outline-light px-5" style="border-radius: 0.75rem; padding: 0.875rem 2rem; font-weight: 600;">Daftar Alumni Baru</a>
                    @endauth
                </div>

                <!-- Stats Preview -->
                <div class="d-flex gap-5 mt-5 pt-3 border-top border-white border-opacity-10">
                    <div>
                        <div class="h4 fw-bold mb-0" style="color: var(--text-white);">4.000+</div>
                        <div class="small text-muted-light">Alumni Terdata</div>
                    </div>
                    <div>
                        <div class="h4 fw-bold mb-0" style="color: var(--text-white);">45+</div>
                        <div class="small text-muted-light">Angkatan Tercatat</div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Card or Illustration -->
            <div class="col-lg-5">
                <div class="login-card" x-show="loginOpen" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0 text-dark">Selamat Datang</h4>
                        <button @click="loginOpen = false" class="btn-close shadow-none" style="font-size: 0.8rem;"></button>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 text-dark">
                            <label class="form-label small fw-bold">Masukkan Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="akun@alumni.com" required>
                        </div>
                        <div class="mb-4 text-dark">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold mb-0">Password</label>
                                <a href="#" class="small text-decoration-none" style="color: var(--primary-navy);">Lupa Password?</a>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <button type="submit" class="btn btn-navy w-100 mb-3">Login</button>
                    </form>
                    <div class="text-center small text-muted">
                        Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: var(--primary-navy);">Daftar di sini</a>
                    </div>
                </div>

                <!-- Illustration Placeholder (SVG) -->
                <div x-show="!loginOpen" class="text-center d-none d-lg-block">
                    <svg viewBox="0 0 500 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="500" height="400" fill="transparent"/>
                        <circle cx="250" cy="200" r="150" fill="white" fill-opacity="0.05"/>
                        <path d="M150 250 L350 250 L250 100 Z" fill="white" fill-opacity="0.1"/>
                        <circle cx="200" cy="180" r="30" fill="white" fill-opacity="0.2"/>
                        <circle cx="300" cy="220" r="20" fill="white" fill-opacity="0.3"/>
                        <rect x="230" y="240" width="40" height="60" rx="5" fill="white" fill-opacity="0.1"/>
                    </svg>
                    <p class="small text-muted-light italic">"Menghubungkan masa lalu dengan peluang masa depan."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fitur Section -->
<section class="py-5 bg-navy-dark border-top border-bottom" style="background-color: var(--bg-navy-dark); border-color: rgba(255, 255, 255, 0.05) !important;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold fs-3 text-white">Sistem Pendataan Terpadu</h2>
            <p class="text-muted-light">Fitur untuk memudahkan pengelolaan dan pencarian data alumni.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-person-lines-fill"></i>📝</div>
                    <h5 class="fw-bold text-dark">Update Data Diri</h5>
                    <p class="small text-muted mb-0">Perbarui informasi kontak dan pekerjaan terbaru Anda untuk kelengkapan database sekolah.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-search"></i>🔍</div>
                    <h5 class="fw-bold text-dark">Direktori Pencarian</h5>
                    <p class="small text-muted mb-0">Temukan teman seangkatan atau kakak kelas dengan mudah melalui sistem pencarian direktori yang komprehensif.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <span class="footer-brand">SMA Bina Warga 1 Palembang</span>
        <p class="small text-muted-light">Sistem Informasi Alumni & Karir Profesional</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="#" class="text-white opacity-75"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white opacity-75"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white opacity-75"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="mt-5 pt-3 border-top border-white border-opacity-10">
            <p class="small text-muted-light mb-0">&copy; 2026 Ikatan Alumni SMA Bina Warga 1. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>