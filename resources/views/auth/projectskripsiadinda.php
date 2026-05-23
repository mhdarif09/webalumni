@extends('layouts.app')

@section('content')
<style>
    /* Sinkronisasi dengan welcome.blade.php */
    :root {
        --primary-navy: #1e3a8a;
        --primary-navy-light: #1e40af;
        --accent-navy-hover: #172554;
        --bg-light: #f8fafc;
    }

    body {
        background-color: var(--primary-navy) !important;
        font-family: 'Inter', sans-serif;
    }

    .register-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
    }

    .login-card { /* Menggunakan class yang sama dengan halaman login */
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        background: white;
        padding: 2.5rem;
        width: 100%;
        max-width: 650px;
        color: #334155;
    }

    h2, .btn-registrasi {
        font-family: 'Outfit', sans-serif;
    }

    .form-label {
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
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
        box-shadow: 0 0 0 4px rgba(30, 58, 138, 0.1);
        outline: none;
    }

    .btn-registrasi {
        background-color: var(--primary-navy);
        color: white;
        border: none;
        padding: 1rem 2rem;
        font-weight: 700;
        border-radius: 0.75rem;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: all 0.2s ease;
        margin-top: 1rem;
    }

    .btn-registrasi:hover {
        background-color: var(--accent-navy-hover);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.3);
        color: white;
    }

    /* Custom Traditional Circular Radio */
    .radio-container {
        display: flex;
        gap: 2rem;
        margin-top: 0.25rem;
    }

    .radio-item {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .radio-item input[type="radio"] {
        appearance: none;
        width: 18px;
        height: 18px;
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
        font-size: 0.9rem;
        font-weight: 500;
    }
</style>

<div class="register-wrapper">
    <div class="login-card">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-1">Registrasi Akun</h2>
            <p class="text-muted small">Lengkapi data biodata alumni Anda</p>
        </div>

        <form action="{{ route('register') }}" method="POST" x-data="{ password: '', confirm: '' }">
            @csrf

            <div class="row g-4">
                <!-- Data Pribadi -->
                <div class="col-12">
                    <label class="form-label">Nama Lengkap Alumni</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="radio-container">
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

                <div class="col-md-6">
                    <label class="form-label">Jurusan</label>
                    <div class="radio-container">
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

                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota Kelahiran" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <!-- Data Akademik -->
                <div class="col-md-6">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" placeholder="2018" required min="1980" max="{{ date('Y') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" class="form-control" placeholder="2021" required min="1980" max="{{ date('Y') + 4 }}">
                </div>

                <!-- Keamanan -->
                <div class="col-12">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email@alumni.com" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Buat Password</label>
                    <input type="password" name="password" x-model="password" class="form-control" placeholder="Minimal 8 karakter" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ulangi Password</label>
                    <input type="password" name="password_confirmation" x-model="confirm" class="form-control" placeholder="Konfirmasi Password" required>
                    <template x-if="confirm && password !== confirm">
                        <div class="text-danger small fw-bold mt-1">Password tidak cocok!</div>
                    </template>
                </div>

                <div class="col-12 pt-2">
                    <button type="submit" class="btn-registrasi">REGISTRASI</button>
                    <div class="text-center mt-4">
                        <p class="small text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: var(--primary-navy);">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
