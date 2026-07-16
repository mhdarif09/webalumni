@extends('layouts.app')

@section('content')
<div class="alumni-dashboard-shell">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body > nav,
        body > footer {
            display: none !important;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background: #F8FAFC;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        .alumni-dashboard-shell {
            min-height: 100vh;
            display: flex;
            background: #F8FAFC;
            color: #111827;
        }

        .dashboard-sidebar {
            width: 300px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 32px 26px;
            background: #ffffff;
            border-right: 1px solid #E5E7EB;
            box-shadow: 0 24px 80px rgba(15, 23, 42, 0.06);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: auto;
            z-index: 30;
        }

        .sidebar-brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .sidebar-logo {
            width: 96px;
            height: 96px;
            margin: 0 auto 18px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(37, 99, 235, 0.14);
            display: grid;
            place-items: center;
            background: #F8FAFC;
        }

        .sidebar-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .sidebar-title {
            margin: 0 auto;
            font-size: 0.78rem;
            font-weight: 700;
            color: #111827;
            line-height: 1.4;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            max-width: 240px;
        }

        .sidebar-title span {
            display: block;
        }

        .sidebar-menu-group {
            margin-top: 40px;
        }

        .sidebar-group-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #6B7280;
            margin-bottom: 18px;
        }

        .sidebar-menu {
            display: grid;
            gap: 12px;
        }

        .sidebar-menu-link,
        .sidebar-menu-button {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            min-height: 52px;
            padding: 0 18px;
            border-radius: 12px;
            border: 1px solid transparent;
            background: #F8FAFC;
            color: #374151;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .sidebar-menu-link:hover,
        .sidebar-menu-button:hover {
            background: #EFF6FF;
            color: #1E3A8A;
        }

        .sidebar-menu-link.active {
            background: #2563EB;
            color: #ffffff;
            box-shadow: 0 10px 28px rgba(37, 99, 235, 0.16);
        }

        .sidebar-menu-link.active i {
            color: #ffffff;
        }

        .sidebar-menu-link i,
        .sidebar-menu-button i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            color: inherit;
            transition: color 0.25s ease;
        }

        .sidebar-separator {
            margin: 32px 0 18px;
            border-top: 1px solid #E5E7EB;
        }

        .sidebar-bottom {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu-section {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #6B7280;
        }

        .dashboard-main {
            margin-left: 300px;
            width: calc(100% - 300px);
            max-width: calc(100% - 300px);
            padding: 36px 36px 40px;
            min-height: 100vh;
            display: grid;
            gap: 28px;
        }

        .topbar {
            min-height: 72px;
            background: #ffffff;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            gap: 16px;
            position: sticky;
            top: 16px;
            z-index: 20;
        }

        .topbar-title {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .topbar-title h2 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .topbar-title p {
            margin: 0;
            font-size: 0.92rem;
            color: #6B7280;
            max-width: 620px;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            border: 1px solid #E5E7EB;
            background: #ffffff;
            display: grid;
            place-items: center;
            color: #1E3A8A;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .topbar-icon:hover {
            background: #EFF6FF;
        }

        .profile-menu-button {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid #E5E7EB;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .profile-menu-button:hover {
            background: #EFF6FF;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 999px;
            background: #1E3A8A;
            color: #ffffff;
            display: grid;
            place-items: center;
            font-weight: 700;
            text-transform: uppercase;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 2px;
            min-width: 0;
        }

        .profile-info span {
            display: block;
            font-size: 0.95rem;
            font-weight: 700;
            color: #111827;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 140px;
        }

        .profile-info small {
            color: #6B7280;
            font-size: 0.78rem;
        }

        .dashboard-hero {
            margin-top: 8px;
            padding: 32px;
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
        }

        .dashboard-hero h1 {
            margin: 0 0 12px;
            font-size: clamp(2rem, 2.4vw, 2.4rem);
            line-height: 1.05;
            font-weight: 800;
        }

        .dashboard-hero p {
            margin: 0;
            color: #6B7280;
            font-size: 1rem;
            max-width: 720px;
            line-height: 1.8;
        }

        .dashboard-meta {
            margin-top: 16px;
            color: #1E40AF;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .dashboard-actions {
            display: grid;
            gap: 20px;
        }

        .action-card {
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 18px;
            padding: 24px;
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
        }

        .action-card-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: #eff6ff;
            display: grid;
            place-items: center;
            color: #1E40AF;
            font-size: 1.25rem;
        }

        .action-card-title {
            margin: 0 0 6px;
            font-size: 1rem;
            font-weight: 700;
            color: #111827;
        }

        .action-card-text {
            margin: 0;
            color: #475569;
            line-height: 1.75;
        }

        .stats-grid {
            margin-top: 24px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #E5E7EB;
            padding: 24px;
            box-shadow: 0 16px 28px rgba(15, 23, 42, 0.05);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            min-height: 170px;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 40px rgba(15, 23, 42, 0.08);
        }

        .stat-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: #EFF6FF;
            display: grid;
            place-items: center;
            color: #1E3A8A;
            font-size: 1.15rem;
            margin-bottom: 16px;
        }

        .stat-card-label {
            margin: 0 0 8px;
            color: #6B7280;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .stat-card-value {
            margin: 0;
            font-size: 1.55rem;
            font-weight: 800;
            color: #111827;
        }

        .profile-section {
            margin-top: 24px;
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(0, 1fr);
            gap: 22px;
        }

        .profile-details,
        .sidebar-info {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            padding: 28px;
        }

        .profile-details-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .profile-details-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            color: #111827;
        }

        .profile-details-title i {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: #EFF6FF;
            color: #1E3A8A;
            font-size: 1.05rem;
        }

        .btn-edit-profile {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 14px;
            border: none;
            background: #1E3A8A;
            color: #ffffff;
            font-weight: 700;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-edit-profile:hover {
            background: #162e6a;
            box-shadow: 0 18px 36px rgba(30, 58, 138, 0.2);
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .detail-item {
            padding: 18px 20px;
            border-radius: 14px;
            background: #F8FAFC;
            border: 1px solid #E5E7EB;
        }

        .detail-item-label {
            margin: 0 0 10px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6B7280;
        }

        .detail-item-value {
            margin: 0;
            font-size: 1rem;
            color: #111827;
            line-height: 1.8;
            word-break: break-word;
        }

        .profile-sidebar-card {
            display: grid;
            gap: 16px;
        }

        .sidebar-card {
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            padding: 22px;
        }

        .sidebar-card h3 {
            margin: 0 0 14px;
            font-size: 1rem;
            font-weight: 700;
        }

        .sidebar-card p {
            margin: 0;
            color: #6B7280;
            line-height: 1.75;
            font-size: 0.95rem;
        }

        .sidebar-card-empty {
            padding: 24px;
            border-radius: 16px;
            background: #F8FAFC;
            border: 1px dashed #D1D5DB;
            text-align: center;
            color: #6B7280;
        }

        .sidebar-card-empty strong {
            display: block;
            margin-bottom: 10px;
            color: #111827;
        }

        @media (max-width: 1100px) {
            .dashboard-main {
                margin-left: 280px;
                width: auto;
            }

            .profile-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 870px) {
            .dashboard-sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                border-right: none;
                box-shadow: none;
                padding: 24px 20px;
            }

            .dashboard-main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                position: relative;
                top: 0;
            }

            .alumni-dashboard-shell {
                flex-direction: column;
            }

            .profile-info span {
                max-width: 100px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .sidebar-menu-link,
            .sidebar-menu-button,
            .topbar,
            .dashboard-hero,
            .stat-card,
            .profile-details,
            .sidebar-card {
                border-radius: 16px;
            }

            .sidebar-menu {
                gap: 10px;
            }

            .topbar {
                padding: 18px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .profile-info span {
                max-width: 80px;
            }
        }
    </style>

    @php
        $user = Auth::user();
        $graduationYear = $user->tahun_lulus ?? '2022';
        $city = $user->kota ?? 'Palembang';
        $region = $user->alamat ? $user->alamat : 'Sumatera Selatan';
        $lastUpdated = $user->updated_at ? $user->updated_at->format('d F Y H:i') : '-';
        $updatedAgo = $user->updated_at ? $user->updated_at->diffForHumans() : '-';
        $birthday = $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y') : '-';
        $avatarInitials = strtoupper(substr($user->name, 0, 1));

        $status = 'Mahasiswa';
        if (!empty($user->perusahaan)) {
            $company = trim($user->perusahaan);
            $position = trim($user->jabatan);
            $status = $position
                ? "{$position} di {$company}"
                : "Bekerja di {$company}";
        } elseif (!empty($user->jabatan) && str_contains(strtolower($user->jabatan), 'mahasiswa')) {
            $status = 'Mahasiswa';
        } elseif (empty($user->perusahaan) && empty($user->jabatan)) {
            $status = 'Mahasiswa';
        }
    @endphp

    <aside class="dashboard-sidebar">
        <div>
            <div class="sidebar-brand">
                <div class="sidebar-logo">
                    <img src="https://tse2.mm.bing.net/th/id/OIP.V-KK0TiimDUpt2PQ2lw6MwHaIX?pid=Api&h=220&P=0" alt="Logo SMA Bina Warga 1 Palembang" />
                </div>
                <div class="sidebar-title">
                    <span>Sistem Informasi Alumni</span>
                    <span>SMA Bina Warga 1</span>
                    <span>Palembang</span>
                </div>
            </div>

            <div class="sidebar-menu-group">
                <span class="sidebar-group-label">Menu Utama</span>
                <div class="sidebar-menu">
                    <a href="{{ route('alumni.dashboard') }}" class="sidebar-menu-link active">
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('alumni.pendidikan.index') }}" class="sidebar-menu-link">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Riwayat Pendidikan
                    </a>
                    <a href="{{ route('alumni.directory.index') }}" class="sidebar-menu-link">
                        <i class="fa-solid fa-briefcase"></i>
                        Riwayat Pekerjaan
                    </a>
                    <a href="#" class="sidebar-menu-link">
                        <i class="fa-solid fa-briefcase-medical"></i>
                        Info Lowongan Kerja
                    </a>
                    <a href="#" class="sidebar-menu-link">
                        <i class="fa-solid fa-mortar-board"></i>
                        Informasi Beasiswa
                    </a>
                    <a href="#" class="sidebar-menu-link">
                        <i class="fa-solid fa-bullhorn"></i>
                        Pengumuman Alumni
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-separator"></div>
            <span class="menu-section">Akun</span>
            <a href="{{ route('alumni.profile.edit') }}" class="sidebar-menu-link">
                <i class="fa-solid fa-user"></i>
                Profil Saya
            </a>
            <a href="{{ route('alumni.profile.edit') }}" class="sidebar-menu-link">
                <i class="fa-solid fa-gear"></i>
                Pengaturan Akun
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-menu-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <main class="dashboard-main">
        <div class="topbar">
            <div class="topbar-title">
                <h2>Dashboard Alumni</h2>
                <p>Halaman utama untuk mengelola data alumni dan informasi penting kampus.</p>
            </div>
            <div class="topbar-actions">
                <button type="button" class="topbar-icon" aria-label="Notifikasi">
                    <i class="fa-regular fa-bell"></i>
                </button>
                <button type="button" class="profile-menu-button">
                    <div class="profile-avatar">{{ $avatarInitials }}</div>
                    <div class="profile-info">
                        <span>{{ $user->name }}</span>
                        <small>Alumni</small>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <section class="dashboard-hero">
            <h1>Selamat Datang, {{ $user->name }}</h1>
            <p>Kelola seluruh informasi alumni Anda melalui dashboard ini. Pastikan data pribadi tetap diperbarui agar informasi akurat dan terkini.</p>
            <p class="dashboard-meta">Terakhir diperbarui {{ $lastUpdated }} ({{ $updatedAgo }}).</p>
        </section>

        <section class="dashboard-actions">
            <div class="action-card">
                <div class="action-card-icon"><i class="fa-solid fa-user-pen"></i></div>
                <div>
                    <p class="action-card-title">Lengkapi Profil Alumni</p>
                    <p class="action-card-text">Perbarui data pendidikan dan domisili Anda untuk status alumni yang lebih akurat.</p>
                </div>
                <a href="{{ route('alumni.profile.edit') }}" class="btn-edit-profile">Edit Profil</a>
            </div>
        </section>

        <section class="stats-grid">
            <article class="stat-card">
                <div class="stat-card-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <p class="stat-card-label">Tahun Lulus</p>
                <p class="stat-card-value">{{ $graduationYear }}</p>
            </article>
            <article class="stat-card">
                <div class="stat-card-icon"><i class="fa-solid fa-user-check"></i></div>
                <p class="stat-card-label">Status Alumni</p>
                <p class="stat-card-value">{{ $status }}</p>
            </article>
            <article class="stat-card">
                <div class="stat-card-icon"><i class="fa-solid fa-location-dot"></i></div>
                <p class="stat-card-label">Domisili</p>
                <p class="stat-card-value">{{ $city }}</p>
            </article>
            <article class="stat-card">
                <div class="stat-card-icon"><i class="fa-solid fa-calendar-days"></i></div>
                <p class="stat-card-label">Terakhir Diperbarui</p>
                <p class="stat-card-value">{{ $lastUpdated }}</p>
            </article>
        </section>

        <section class="profile-section">
            <div class="profile-details">
                <div class="profile-details-header">
                    <div class="profile-details-title">
                        <i class="fa-solid fa-user"></i>
                        Data Pribadi
                    </div>
                    <a href="{{ route('alumni.profile.edit') }}" class="btn-edit-profile">
                        <i class="fa-solid fa-pen"></i>
                        Edit Profil
                    </a>
                </div>
                <div class="detail-grid">
                    <div class="detail-item">
                        <p class="detail-item-label">Nama Lengkap</p>
                        <p class="detail-item-value">{{ $user->name }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Email</p>
                        <p class="detail-item-value">{{ $user->email }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Tempat Lahir</p>
                        <p class="detail-item-value">{{ $user->tempat_lahir ?? '-' }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Tanggal Lahir</p>
                        <p class="detail-item-value">{{ $birthday }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Jenis Kelamin</p>
                        <p class="detail-item-value">{{ $user->jenis_kelamin ?? '-' }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Nomor HP</p>
                        <p class="detail-item-value">{{ $user->username ?? '-' }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Domisili</p>
                        <p class="detail-item-value">{{ $city }}</p>
                    </div>
                    <div class="detail-item">
                        <p class="detail-item-label">Alamat</p>
                        <p class="detail-item-value">{{ $user->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-info">
                <div class="sidebar-card">
                    <h3>Informasi Akun</h3>
                    <p>Gunakan halaman ini untuk memperbarui data alumni, melihat informasi lowongan kerja, dan menjaga profil tetap aktif.</p>
                </div>
                <div class="sidebar-card">
                    <h3>Pengumuman</h3>
                    <div class="sidebar-card-empty">
                        <strong>Belum ada pengumuman terbaru.</strong>
                        Informasi akan ditampilkan di sini ketika tersedia.
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
