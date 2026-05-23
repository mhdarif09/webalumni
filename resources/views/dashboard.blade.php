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

    /* Dashboard Header / Hero */
    .dashboard-hero {
        background-color: var(--primary-navy);
        background-image: linear-gradient(135deg, var(--primary-navy) 0%, var(--primary-soft) 100%);
        padding: 5rem 2rem 8rem;
        color: white;
        text-align: center;
        border-radius: 0 0 4rem 4rem;
        box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .dashboard-hero h1 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 0.75rem;
        letter-spacing: -0.03em;
    }

    .dashboard-hero p {
        opacity: 0.9;
        font-size: 1.25rem;
        max-width: 700px;
        margin: 0 auto;
        font-weight: 300;
    }

    /* Layout Container */
    .dashboard-container {
        max-width: 1100px;
        margin: -5rem auto 5rem;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Top Nav Card Detail */
    .top-nav-card {
        background: white;
        border-radius: 1.5rem;
        padding: 1.25rem 2.5rem;
        margin-bottom: 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .avatar-box {
        width: 55px;
        height: 55px;
        background: var(--primary-navy);
        color: white;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.5rem;
        box-shadow: 0 5px 15px -3px rgba(52, 73, 94, 0.4);
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .btn-action {
        padding: 0.75rem 1.5rem;
        border-radius: 1rem;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        transition: all 0.3s ease;
        text-decoration: none !important;
        border: none;
    }

    .btn-back {
        background-color: var(--bg-light);
        color: var(--primary-navy);
    }

    .btn-back:hover {
        background-color: var(--border-color);
        transform: translateX(-5px);
    }

    .btn-logout {
        background-color: #fee2e2;
        color: #dc2626;
    }

    .btn-logout:hover {
        background-color: #dc2626;
        color: white;
        transform: translateY(-2px);
    }

    /* Feature Grid */
    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .feature-card {
        background: white;
        border-radius: 2rem;
        padding: 2.5rem 1.5rem;
        text-align: center;
        text-decoration: none;
        color: inherit;
        border: 1px solid transparent;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }

    .feature-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 40px -10px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-navy);
    }

    .feature-icon {
        font-size: 2.25rem;
        margin-bottom: 1.5rem;
        display: inline-block;
        padding: 1.25rem;
        background: var(--bg-light);
        border-radius: 1.5rem;
        color: var(--primary-navy);
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        background: var(--primary-navy);
        color: white;
    }

    .feature-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--primary-navy);
    }

    .feature-desc {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.5;
    }

    /* Stats Section */
    .stats-card {
        background: white;
        border-radius: 2rem;
        padding: 2.5rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }

    .stats-header {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--primary-navy);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stats-header::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        text-align: center;
    }

    .stat-number {
        font-weight: 800;
        font-size: 2rem;
        color: var(--primary-navy);
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #64748b;
        font-weight: 500;
    }

    /* Recent Jobs & Events Highlights */
    .job-section, .event-section {
        margin-bottom: 3rem;
    }

    .job-grid-dashboard, .event-grid-dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .job-card-mini, .event-card-mini {
        background: white;
        border-radius: 1.5rem;
        padding: 1.5rem;
        display: flex;
        gap: 1.25rem;
        align-items: center;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border: 1px solid transparent;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .job-card-mini:hover, .event-card-mini:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-navy);
    }

    .job-icon-box, .event-icon-box {
        width: 50px;
        height: 50px;
        background: var(--bg-light);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .job-mini-info h4, .event-mini-info h4 {
        font-family: 'Outfit', sans-serif;
        font-weight: 600;
        color: var(--primary-navy);
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .job-mini-info p, .event-mini-info p {
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 0;
    }

    /* Footer Decorative */
    .dashboard-footer {
        text-align: center;
        margin-top: 4rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
        color: #94a3b8;
        font-size: 0.85rem;
    }

    /* Mobile */
    @media (max-width: 768px) {
        .top-nav-card {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-hero">
    <div class="max-w-7xl mx-auto">
        <p class="mb-3 uppercase tracking-widest font-bold text-xs opacity-75">Member Area Alumni Connect</p>
        <h1>Beranda Alumni</h1>
        <p>Hi!, <strong>{{ Auth::user()->name }}</strong>. Senang melihat Anda kembali. Mari jalin silaturahmi dan raih peluang masa depan bersama.</p>
    </div>
</div>

<div class="dashboard-container">
    <!-- Mini Nav & Action Bar -->
    <div class="top-nav-card">
        <div class="user-profile">
            <div class="avatar-box">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <div>
                <p class="font-bold text-slate-800 text-lg leading-tight mb-0">{{ Auth::user()->name }}</p>
                <p class="text-sm text-slate-500 mb-0">Status: Alumni Terverifikasi</p>
            </div>
        </div>
        
        <div class="nav-actions">
            <a href="{{ url('/') }}" class="btn-action btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                KEMBALI
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-action btn-logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    KELUAR
                </button>
            </form>
        </div>
    </div>

    <!-- Quick Quick Features -->
    <div class="action-grid">
        <a href="{{ route('alumni.profile.edit') }}" class="feature-card">
            <div class="feature-icon">👤</div>
            <h3 class="feature-title">Profil Saya</h3>
            <p class="feature-desc">Perbarui data biodata, pekerjaan saat ini, dan domisili terbaru Anda.</p>
        </a>

        <a href="{{ route('alumni.directory.index') }}" class="feature-card">
            <div class="feature-icon">🔍</div>
            <h3 class="feature-title">Direktori Alumni</h3>
            <p class="feature-desc">Cari teman seangkatan atau kakak kelas berdasarkan tahun lulus dan jurusan.</p>
        </a>
    </div>



    <!-- Stats & Highlight Section -->
    <div class="stats-card">
        <div class="stats-header">Data Ringkasan Alumni</div>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">4.281</div>
                <div class="stat-label">Total Alumni Terdaftar</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">45</div>
                <div class="stat-label">Total Angkatan Terdata</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">89%</div>
                <div class="stat-label">Tingkat Validitas Data</div>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">
        <p>&copy; {{ date('Y') }} SMA Bina Warga 1 Palembang. Seluruh Hak Cipta Dilindungi.</p>
        <p class="mt-1 xsmall opacity-50">Dirancang secara eksklusif untuk komunitas Alumni terintegritas.</p>
    </div>
</div>
@endsection
