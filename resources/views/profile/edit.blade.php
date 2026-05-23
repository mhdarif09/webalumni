@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-navy: #34495E;
        --primary-soft: #455A64;
        --accent-navy-hover: #2C3E50;
        --border-color: #E2E8F0;
        --bg-light: #F8FAFC;
    }

    body {
        background-color: #F1F5F9 !important;
        font-family: 'Inter', sans-serif;
    }

    /* Hero Section */
    .profile-hero {
        background-color: var(--primary-navy);
        background-image: linear-gradient(135deg, var(--primary-navy) 0%, var(--primary-soft) 100%);
        padding: 4rem 2rem 6rem;
        color: white;
        text-align: center;
        border-radius: 0 0 3rem 3rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
    }

    .profile-hero h1 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .profile-hero p {
        opacity: 0.85;
        font-size: 1.1rem;
    }

    /* Container */
    .profile-container {
        max-width: 900px;
        margin: -4rem auto 5rem;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Card Style */
    .profile-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0,0,0,0.02);
    }

    .card-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: var(--primary-navy);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    /* Grid Row */
    .form-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        align-items: center;
        margin-bottom: 1.5rem;
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
    }

    .form-control:focus {
        border-color: var(--primary-navy);
        box-shadow: 0 0 0 4px rgba(52, 73, 94, 0.1);
        outline: none;
        background-color: white;
    }

    .btn-save {
        background-color: var(--primary-navy);
        color: white;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Outfit', sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        width: 100%;
    }

    .btn-save:hover {
        background-color: var(--accent-navy-hover);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
    }

    .back-nav {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 1rem;
    }

    .btn-back-profile {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        opacity: 0.8;
        transition: opacity 0.2s;
    }

    .btn-back-profile:hover {
        opacity: 1;
    }

    @media (max-width: 640px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }
    }
</style>

<div class="profile-hero">
    <div class="max-w-7xl mx-auto">
        <div class="back-nav">
            <a href="{{ route('alumni.dashboard') }}" class="btn-back-profile">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Dashboard
            </a>
        </div>
        <h1>Profil Saya</h1>
        <p>Lengkapi dan perbarui informasi biodata serta karier Anda secara mendetail.</p>
    </div>
</div>

<div class="profile-container">
    <form method="post" action="{{ route('alumni.profile.update') }}">
        @csrf
        @method('patch')

        <!-- Card 1: Biodata -->
        <div class="profile-card">
            <div class="card-title">Biodata Alumni</div>
            
            <div class="form-row">
                <label class="field-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="form-row">
                <label class="field-label">Jenis Kelamin</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Laki-laki' ? 'checked' : '' }}>
                        <span class="text-sm">Laki-laki</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                        <span class="text-sm">Perempuan</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <label class="field-label">Jurusan Sekolah</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="jurusan" value="IPA" {{ old('jurusan', Auth::user()->jurusan) == 'IPA' ? 'checked' : '' }}>
                        <span class="text-sm">IPA</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="jurusan" value="IPS" {{ old('jurusan', Auth::user()->jurusan) == 'IPS' ? 'checked' : '' }}>
                        <span class="text-sm">IPS</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <label class="field-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Tahun Masuk</label>
                <input type="number" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', Auth::user()->tahun_masuk) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" class="form-control" placeholder="Contoh: 2022" value="{{ old('tahun_lulus', Auth::user()->tahun_lulus) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
            </div>
        </div>

        <!-- Card 2: Karier -->
        <div class="profile-card">
            <div class="card-title">Pekerjaan Saat Ini</div>
            
            <div class="form-row">
                <label class="field-label">Jabatan / Posisi</label>
                <input type="text" name="jabatan" class="form-control" placeholder="Contoh: Software Engineer" value="{{ old('jabatan', Auth::user()->jabatan) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Nama Perusahaan</label>
                <input type="text" name="perusahaan" class="form-control" placeholder="Nama instansi atau perusahaan" value="{{ old('perusahaan', Auth::user()->perusahaan) }}">
            </div>
        </div>

        <!-- Card 3: Domisili -->
        <div class="profile-card">
            <div class="card-title">Domisili Terbaru</div>
            
            <div class="form-row">
                <label class="field-label">Kota / Kabupaten</label>
                <input type="text" name="kota" class="form-control" placeholder="Kota tempat tinggal sekarang" value="{{ old('kota', Auth::user()->kota) }}">
            </div>

            <div class="form-row">
                <label class="field-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat detail domisili saat ini">{{ old('alamat', Auth::user()->alamat) }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn-save shadow-lg">SIMPAN PERUBAHAN PROFIL</button>
    </form>

    <!-- Additional sections from standard Breeze can be added here if needed -->
    <div class="mt-5">
        <div class="profile-card">
            <div class="card-title">Keamanan Akun</div>
            @include('profile.partials.update-password-form')
        </div>
    </div>
</div>
@endsection
