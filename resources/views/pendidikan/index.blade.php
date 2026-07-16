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

        .content-card {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            padding: 28px;
        }

        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .content-header h2 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            border-radius: 14px;
            border: none;
            background: #2563EB;
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.25s ease;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            background: #1D4ED8;
        }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 10px;
            border: none;
            background: #FEE2E2;
            color: #DC2626;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .btn-danger:hover {
            background: #FECACA;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 10px;
            border: 1px solid #E5E7EB;
            background: #ffffff;
            color: #374151;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-secondary:hover {
            background: #F8FAFC;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 14px 16px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6B7280;
            border-bottom: 2px solid #E5E7EB;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #F3F4F6;
            font-size: 0.95rem;
            color: #111827;
        }

        tr:hover td {
            background: #F8FAFC;
        }

        .actions-cell {
            display: flex;
            gap: 8px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6B7280;
        }

        .empty-state i {
            font-size: 3rem;
            color: #D1D5DB;
            margin-bottom: 16px;
        }

        .empty-state p {
            margin: 0 0 20px;
            font-size: 1rem;
        }

        .alert-success {
            padding: 16px 20px;
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            border-radius: 12px;
            color: #065F46;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 20px;
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
        }
    </style>

    @php
        $user = Auth::user();
        $avatarInitials = strtoupper(substr($user->name, 0, 1));
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
                    <a href="{{ route('alumni.dashboard') }}" class="sidebar-menu-link">
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('alumni.pendidikan.index') }}" class="sidebar-menu-link active">
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
                <h2>Riwayat Pendidikan</h2>
                <p>Kelola riwayat pendidikan Anda.</p>
            </div>
            <div class="topbar-actions">
                <a href="{{ route('alumni.pendidikan.create') }}" class="btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Riwayat
                </a>
            </div>
        </div>

        <div class="content-card">
            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if ($pendidikan->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>Belum ada riwayat pendidikan. Tambahkan riwayat pendidikan Anda.</p>
                    <a href="{{ route('alumni.pendidikan.create') }}" class="btn-primary">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Riwayat Pendidikan
                    </a>
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Jenjang</th>
                                <th>Institusi</th>
                                <th>Jurusan</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Lulus</th>
                                <th>IPK</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendidikan as $p)
                                <tr>
                                    <td>{{ $p->jenjang }}</td>
                                    <td>{{ $p->institusi }}</td>
                                    <td>{{ $p->jurusan ?? '-' }}</td>
                                    <td>{{ $p->tahun_masuk ?? '-' }}</td>
                                    <td>{{ $p->tahun_lulus ?? '-' }}</td>
                                    <td>{{ $p->ipk ?? '-' }}</td>
                                    <td>
                                        <div class="actions-cell">
                                            <a href="{{ route('alumni.pendidikan.edit', $p) }}" class="btn-secondary">
                                                <i class="fa-solid fa-pen"></i>
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('alumni.pendidikan.destroy', $p) }}" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</div>
@endsection
