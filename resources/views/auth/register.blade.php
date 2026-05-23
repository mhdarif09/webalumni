@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-navy: #34495E;
        --accent-navy-hover: #2C3E50;
        --border-color: #E2E8F0;
        --bg-light: #F8FAFC;
    }

    body {
        background-color: var(--primary-navy) !important;
        background-image: radial-gradient(circle at 100% 0%, rgba(255, 255, 255, 0.05) 0%, transparent 40%);
        font-family: 'Inter', sans-serif;
    }

    .register-container {
        padding: 4rem 1rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .header-section {
        text-align: center;
        margin-bottom: 3.5rem;
        color: white;
    }

    .header-section h1 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 2.5rem;
        letter-spacing: -0.025em;
        margin-bottom: 0.5rem;
    }

    .header-section p {
        opacity: 0.8;
        font-size: 1rem;
    }

    /* Style Tabel Kecil / Card */
    .form-card {
        background: white;
        border-radius: 1.25rem;
        padding: 2.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .card-label {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: var(--primary-navy);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-label::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    /* Grid System for Alignment */
    .form-row {
        display: grid;
        grid-template-columns: 220px 1fr;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .form-row:last-child {
        margin-bottom: 0;
    }

    .field-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: #475569;
    }

    .form-control {
        width: 100%;
        border: 1px solid var(--border-color);
        padding: 0.75rem 1.25rem;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        background-color: var(--bg-light);
        transition: all 0.2s ease;
        color: #1e293b;
    }

    .form-control:focus {
        border-color: var(--primary-navy);
        background-color: white;
        box-shadow: 0 0 0 4px rgba(52, 73, 94, 0.1);
        outline: none;
    }

    /* Custom Radio Styling */
    .radio-group {
        display: flex;
        gap: 2.5rem;
    }

    .radio-item {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .radio-item input[type="radio"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #cbd5e1;
        border-radius: 50%;
        margin-right: 10px;
        position: relative;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .radio-item input[type="radio"]:checked {
        border-color: var(--primary-navy);
    }

    .radio-item input[type="radio"]:checked::after {
        content: "";
        width: 10px;
        height: 10px;
        background: var(--primary-navy);
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .radio-text {
        font-size: 0.95rem;
        font-weight: 500;
        color: #1e293b;
    }

    .btn-registrasi {
        background-color: white;
        color: var(--primary-navy);
        border: none;
        padding: 1.25rem;
        border-radius: 1rem;
        width: 100%;
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: all 0.3s ease;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        margin-top: 1rem;
    }

    .btn-registrasi:hover {
        background-color: #f8fafc;
        transform: translateY(-3px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
    }

    .footer-links {
        text-align: center;
        margin-top: 2rem;
        color: white;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .footer-links a {
        color: white;
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 4px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }
        .register-container {
            padding: 2rem 1rem;
        }
    }
</style>

<div class="register-container">
    <div class="header-section">
        <h1>Registrasi Alumni</h1>
        <p>Silakan lengkapi biodata Anda pada tabel berikut secara detail.</p>
    </div>

    <form action="{{ route('register') }}" method="POST" x-data="{ password: '', confirm: '' }">
        @csrf

        <!-- Card 1: Identitas Pribadi -->
        <div class="form-card">
            <div class="card-label">Identitas Alumni</div>
            
            <div class="form-row">
                <label class="field-label">Nama Lengkap Alumni</label>
                <input type="text" name="name" class="form-control" placeholder="Adinda Aulia Salsabilla" required>
            </div>

            <div class="form-row">
                <label class="field-label">Jenis Kelamin</label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required>
                        <span class="radio-text">Laki-laki</span>
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="Perempuan">
                        <span class="radio-text">Perempuan</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <label class="field-label">Jurusan Sekolah</label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="jurusan" value="IPA" required>
                        <span class="radio-text">IPA</span>
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="jurusan" value="IPS">
                        <span class="radio-text">IPS</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Card 2: Kelahiran & Akademik -->
        <div class="form-card">
            <div class="card-label">Pendidikan & Kelahiran</div>

            <div class="form-row">
                <label class="field-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Palembang" required>
            </div>

            <div class="form-row">
                <label class="field-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="form-row">
                <label class="field-label">Tahun Masuk Sekolah</label>
                <input type="number" name="tahun_masuk" class="form-control" placeholder="2019" required>
            </div>

            <div class="form-row">
                <label class="field-label">Tahun Kelulusan</label>
                <input type="number" name="tahun_lulus" class="form-control" placeholder="2022" required>
            </div>
        </div>

        <!-- Card 3: Keamanan Akun -->
        <div class="form-card">
            <div class="card-label">Kredensial Login</div>

            <div class="form-row">
                <label class="field-label">Alamat Email Aktif</label>
                <input type="email" name="email" class="form-control" placeholder="adinsalsabilla18@gmail.com" required>
            </div>

            <div class="form-row">
                <label class="field-label">Buat Password</label>
                <input type="password" name="password" x-model="password" class="form-control" placeholder="**********" required>
            </div>

            <div class="form-row">
                <label class="field-label">Konfirmasi Password</label>
                <div>
                    <input type="password" name="password_confirmation" x-model="confirm" class="form-control" placeholder="Konfirmasi Password" required>
                    <template x-if="confirm && password !== confirm">
                        <p class="text-danger fw-bold small mt-2">Password tidak cocok!</p>
                    </template>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <a href="{{ route('dashboard') }}" class="btn-registrasi" style="display: block; text-align: center; text-decoration: none;">REGISTRASI SEKARANG</a>

        <div class="footer-links">
            Sudah terdaftar? <a href="{{ route('login') }}">Klik untuk Login</a>
        </div>
    </form>
</div>
@endsection
