@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-navy: #34495E;
        --primary-soft: #455A64;
        --accent-blue: #3498DB;
        --border-color: #E2E8F0;
        --bg-body: #F1F5F9;
        --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
    }

    body {
        background-color: var(--bg-body) !important;
        font-family: 'Inter', sans-serif;
    }

    /* Hero */
    .dir-hero {
        background-color: var(--primary-navy);
        background-image: linear-gradient(135deg, var(--primary-navy) 0%, var(--primary-soft) 100%);
        padding: 4rem 2rem 7rem;
        color: white;
        text-align: center;
        border-radius: 0 0 4rem 4rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .dir-hero h1 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 0.75rem;
    }

    .dir-hero p {
        opacity: 0.9;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Main Container */
    .dir-container {
        max-width: 1000px;
        margin: -5rem auto 5rem;
        padding: 0 1.5rem;
    }

    /* Search & Metrics Bar */
    .control-bar {
        background: white;
        border-radius: 1.5rem;
        padding: 1.25rem 2rem;
        margin-bottom: 2.5rem;
        box-shadow: var(--card-shadow);
        display: flex;
        align-items: center;
        gap: 1.5rem;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .search-wide {
        flex: 1;
        position: relative;
    }

    .search-wide input {
        width: 100%;
        padding: 0.85rem 1.25rem 0.85rem 3rem;
        border: 1px solid var(--border-color);
        border-radius: 1.25rem;
        background-color: #F8FAFC;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .search-wide input:focus {
        border-color: var(--primary-navy);
        background-color: white;
        box-shadow: 0 0 0 4px rgba(52, 73, 94, 0.08);
        outline: none;
    }

    .search-wide i {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    /* Alumni List Item */
    .alumni-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .alumni-row {
        background: white;
        border-radius: 1.25rem;
        padding: 1.25rem 1.75rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    .alumni-row:hover {
        transform: translateX(8px);
        border-color: var(--primary-navy);
        box-shadow: 0 12px 20px -5px rgba(52, 73, 94, 0.1);
        z-index: 10;
    }

    .avatar-circle {
        width: 60px;
        height: 60px;
        min-width: 60px;
        background: #F1F5F9;
        color: var(--primary-navy);
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 800;
        font-family: 'Outfit', sans-serif;
        border: 2px solid white;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .alumni-info {
        flex: 1;
    }

    .name-badge {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.25rem;
    }

    .name-badge h3 {
        font-family: 'Outfit', sans-serif;
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1E293B;
    }

    .is-real-badge {
        background: #E0F2FE;
        color: #0369A1;
        font-size: 0.65rem;
        font-weight: 800;
        text-transform: uppercase;
        padding: 0.25rem 0.6rem;
        border-radius: 2rem;
        letter-spacing: 0.05em;
    }

    .job-text {
        color: #64748B;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .alumni-meta-tags {
        display: flex;
        gap: 1.25rem;
        margin-left: auto;
    }

    .meta-tag {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .meta-value {
        font-weight: 700;
        color: #475569;
        font-size: 0.9rem;
    }

    .meta-label {
        font-size: 0.7rem;
        color: #94A3B8;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .alumni-actions {
        display: flex;
        gap: 0.75rem;
        margin-left: 1rem;
    }

    .btn-action-icon {
        width: 40px;
        height: 40px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F8FAFC;
        color: var(--primary-navy);
        border: 1px solid var(--border-color);
        transition: all 0.2s;
        cursor: pointer;
    }

    .btn-action-icon:hover {
        background: var(--primary-navy);
        color: white;
        transform: translateY(-3px);
    }

    /* Modal Message Mockup */
    .message-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .message-card {
        background: white;
        width: 100%;
        max-width: 500px;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .message-card h2 {
        font-family: 'Outfit', sans-serif;
        color: var(--primary-navy);
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .message-card textarea {
        width: 100%;
        padding: 1rem;
        border-radius: 1rem;
        border: 1px solid var(--border-color);
        background: #F8FAFC;
        margin-bottom: 1.5rem;
        resize: none;
    }

    .message-card .btn-send {
        background: var(--primary-navy);
        color: white;
        padding: 1rem;
        width: 100%;
        border-radius: 1rem;
        font-weight: 700;
        border: none;
        transition: all 0.3s;
    }

    .message-card .btn-send:hover {
        background: var(--primary-soft);
        transform: translateY(-2px);
    }

    .close-modal {
        margin-top: 1rem;
        color: #94A3B8;
        font-size: 0.9rem;
        text-align: center;
        cursor: pointer;
        font-weight: 600;
    }

    /* Back Nav */
    .top-nav {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 1rem;
    }

    .btn-back-dir {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        opacity: 0.8;
        transition: 0.3s;
    }

    .btn-back-dir:hover {
        opacity: 1;
        transform: translateX(-5px);
    }

    @media (max-width: 768px) {
        .alumni-meta-tags {
            display: none;
        }
        .dir-hero h1 { font-size: 2rem; }
    }
</style>

<div class="dir-hero">
    <div class="max-w-7xl mx-auto">
        <div class="top-nav">
            <a href="{{ route('alumni.dashboard') }}" class="btn-back-dir">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Dashboard
            </a>
        </div>
        <h1>Direktori Alumni</h1>
        <p>Menjelajahi koneksi profesional antar ribuan lulusan SMA Bina Warga 1 Palembang yang tersebar di berbagai industri.</p>
    </div>
</div>

<div class="dir-container">
    <div class="control-bar">
        <div class="search-wide">
            <svg class="search-icon" style="position:absolute; left: 1.25rem; top: 1.1rem; color:#94a3b8" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Cari nama, jabatan, atau angkatan...">
        </div>
        <div class="hidden md:block">
            <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Total: {{ count($alumni) }} Alumni</span>
        </div>
    </div>

    <div class="alumni-list">
        @foreach($alumni as $person)
        <div class="alumni-row">
            <div class="avatar-circle">
                {{ substr($person['name'], 0, 1) }}
            </div>
            
            <div class="alumni-info">
                <div class="name-badge">
                    <h3>{{ $person['name'] }}</h3>
                    @if($person['is_real'])
                        <span class="is-real-badge">Alumni Terverifikasi</span>
                    @endif
                </div>
                <p class="job-text">{{ $person['jabatan'] }} @ <span class="text-slate-500">{{ $person['perusahaan'] }}</span></p>
            </div>

            <div class="alumni-meta-tags">
                <div class="meta-tag">
                    <span class="meta-value">{{ $person['jurusan'] }}</span>
                    <span class="meta-label">Jurusan</span>
                </div>
                <div class="meta-tag">
                    <span class="meta-value">{{ $person['tahun_lulus'] }}</span>
                    <span class="meta-label">Angkatan</span>
                </div>
            </div>

            <div class="alumni-actions">
                <button onclick="openMessage('{{ $person['name'] }}')" class="btn-action-icon" title="Kirim Pesan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </button>
                <div class="btn-action-icon" title="Lihat Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Message Modal Mockup -->
<div id="messageModal" class="message-modal">
    <div class="message-card">
        <h2>Kirim Pesan ke <span id="targetName" style="color: var(--accent-blue)">...</span></h2>
        <p class="text-slate-500 mb-4 text-sm">Pesan akan dikirim langsung ke kotak masuk alumni ini.</p>
        <textarea rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
        <button class="btn-send" onclick="sendMessage()">KIRIM PESAN SEKARANG</button>
        <div class="close-modal" onclick="closeMessage()">BATALKAN</div>
    </div>
</div>

<script>
    function openMessage(name) {
        document.getElementById('targetName').innerText = name;
        document.getElementById('messageModal').style.display = 'flex';
    }

    function closeMessage() {
        document.getElementById('messageModal').style.display = 'none';
    }

    function sendMessage() {
        alert('Mockup: Pesan Anda telah dikirim! Fitur chatting real-time sedang dalam pengembangan.');
        closeMessage();
    }
</script>
@endsection
