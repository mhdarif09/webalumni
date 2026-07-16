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
        }

        .content-card {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #E5E7EB;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            padding: 32px;
            max-width: 680px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #D1D5DB;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #111827;
            background: #ffffff;
            transition: border-color 0.25s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
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

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            border-radius: 14px;
            border: 1px solid #D1D5DB;
            background: #ffffff;
            color: #374151;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            font-size: 0.9rem;
        }

        .btn-secondary:hover {
            background: #F8FAFC;
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

            .form-row {
                grid-template-columns: 1fr;
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
                <h2>Edit Riwayat Pendidikan</h2>
                <p>Perbarui data pendidikan Anda.</p>
            </div>
        </div>

        <div class="content-card">
            <form method="POST" action="{{ route('alumni.pendidikan.update', $pendidikan) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select name="jenjang" id="jenjang" class="form-control" required>
                        <option value="">Pilih Jenjang</option>
                        <option value="SMA/SMK" {{ old('jenjang', $pendidikan->jenjang) == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="D1" {{ old('jenjang', $pendidikan->jenjang) == 'D1' ? 'selected' : '' }}>D1</option>
                        <option value="D2" {{ old('jenjang', $pendidikan->jenjang) == 'D2' ? 'selected' : '' }}>D2</option>
                        <option value="D3" {{ old('jenjang', $pendidikan->jenjang) == 'D3' ? 'selected' : '' }}>D3</option>
                        <option value="D4" {{ old('jenjang', $pendidikan->jenjang) == 'D4' ? 'selected' : '' }}>D4</option>
                        <option value="S1" {{ old('jenjang', $pendidikan->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('jenjang', $pendidikan->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ old('jenjang', $pendidikan->jenjang) == 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                    @error('jenjang') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="institusi">Institusi</label>
                    <input type="text" name="institusi" id="institusi" class="form-control" value="{{ old('institusi', $pendidikan->institusi) }}" placeholder="Nama sekolah/universitas" required>
                    @error('institusi') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $pendidikan->jurusan) }}" placeholder="IPA, IPS, Teknik Informatika, dll">
                    @error('jurusan') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}" placeholder="2020" min="1900" max="2099">
                        @error('tahun_masuk') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $pendidikan->tahun_lulus) }}" placeholder="2024" min="1900" max="2099">
                        @error('tahun_lulus') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="ipk">IPK / Nilai Akhir</label>
                    <input type="text" name="ipk" id="ipk" class="form-control" value="{{ old('ipk', $pendidikan->ipk) }}" placeholder="3.50">
                    @error('ipk') <small style="color:#DC2626;margin-top:4px;display:block;">{{ $message }}</small> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-save"></i>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('alumni.pendidikan.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
