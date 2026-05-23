@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-navy: #34495E;
        --secondary-navy: #2C3E50;
        --bg-main: #F4F7F6;
        --border-color: #E2E8F0;
        --text-dark: #1E293B;
        --text-muted: #64748B;
        --accent-blue: #3B82F6;
    }

    body {
        background-color: var(--bg-main) !important;
    }

    /* Layout Wrapper */
    .admin-wrapper {
        display: flex;
        min-height: calc(100vh - 64px); /* Assuming 64px top nav from app layout */
        background-color: var(--bg-main);
    }

    /* Sidebar */
    .admin-sidebar {
        width: 260px;
        background-color: var(--primary-navy);
        color: white;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
    }

    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .sidebar-header h3 {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 1.1rem;
        margin: 0;
        letter-spacing: 0.5px;
        color: white;
    }

    .sidebar-header p {
        font-size: 0.8rem;
        margin: 0;
        opacity: 0.7;
    }

    .sidebar-menu {
        padding: 1rem 0;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 1.5rem;
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .sidebar-link:hover {
        background-color: rgba(255,255,255,0.05);
        color: white;
    }

    .sidebar-link.active {
        background-color: rgba(255,255,255,0.1);
        color: white;
        border-left-color: white;
    }

    .sidebar-icon {
        font-size: 1.1rem;
    }

    /* Main Workspace */
    .admin-content {
        flex: 1;
        padding: 2rem;
        overflow-y: auto;
    }

    .page-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.02);
        border: 1px solid var(--border-color);
    }

    .stat-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .icon-blue { background: #EEF2FF; color: #4F46E5; }
    .icon-emerald { background: #ECFDF5; color: #10B981; }
    .icon-amber { background: #FFFBEB; color: #F59E0B; }
    .icon-rose { background: #FFF1F2; color: #E11D48; }

    .stat-details h4 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        font-family: 'Outfit', sans-serif;
        color: var(--text-dark);
    }

    .stat-details p {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* DataTable Card */
    .table-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }

    .table-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
    }

    .table-header h5 {
        margin: 0;
        font-family: 'Outfit', sans-serif;
        font-weight: 600;
        color: var(--text-dark);
    }

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-input {
        width: 100%;
        padding: 0.6rem 1rem 0.6rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .search-input:focus {
        border-color: var(--primary-navy);
        box-shadow: 0 0 0 3px rgba(52,73,94,0.1);
    }

    .search-icon {
        position: absolute;
        left: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 1rem 1.5rem;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        background-color: #F8FAFC;
        font-weight: 600;
        border-bottom: 2px solid var(--border-color);
    }

    td {
        padding: 1rem 1.5rem;
        font-size: 0.95rem;
        color: var(--text-dark);
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: #F8FAFC;
    }

    .badge {
        padding: 0.35rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-success { background-color: #D1FAE5; color: #065F46; }
    .badge-warning { background-color: #FEF3C7; color: #92400E; }

    .action-btn {
        background: none;
        border: none;
        color: var(--accent-blue);
        font-weight: 500;
        cursor: pointer;
        font-size: 0.85rem;
        padding: 0;
    }

    .action-btn:hover {
        text-decoration: underline;
    }

    @media (max-width: 992px) {
        .admin-sidebar {
            display: none; /* In a real app, you'd make this a toggleable offcanvas */
        }
    }
</style>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
            <p>Database Alumni</p>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="sidebar-link active">
                <span class="sidebar-icon">👥</span>
                Kelola Data Alumni
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">📊</span>
                Laporan
            </a>
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">⚙️</span>
                Manajemen Akun
            </a>
            <div style="margin-top: 2rem; border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 1rem;">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <span class="sidebar-icon">🏠</span>
                    Kembali ke Web
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <h2 class="page-title">Kelola Data Alumni</h2>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon-box icon-blue">👥</div>
                <div class="stat-details">
                    <h4>4,281</h4>
                    <p>Total Alumni Terdata</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-box icon-emerald">👨</div>
                <div class="stat-details">
                    <h4>2,150</h4>
                    <p>Alumni Laki-Laki</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-box icon-rose">👩</div>
                <div class="stat-details">
                    <h4>2,131</h4>
                    <p>Alumni Perempuan</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-box icon-amber">⏳</div>
                <div class="stat-details">
                    <h4>12</h4>
                    <p>Menunggu Validasi</p>
                </div>
            </div>
        </div>

        <!-- DataTable -->
        <div class="table-card">
            <div class="table-header">
                <h5>Daftar Induk Alumni</h5>
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari nama, angkatan, atau jurusan...">
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table id="alumniTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Angkatan</th>
                            <th>Jurusan</th>
                            <th>Status Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-slate-500 font-mono">ALM-1901</td>
                            <td class="font-semibold text-slate-800">Muhammad Agung</td>
                            <td>2018</td>
                            <td>IPA</td>
                            <td><span class="badge badge-success">Tervalidasi</span></td>
                            <td><button class="action-btn">Detail</button></td>
                        </tr>
                        <tr>
                            <td class="text-slate-500 font-mono">ALM-2101</td>
                            <td class="font-semibold text-slate-800">Adinda Aulia Salsabilla</td>
                            <td>2020</td>
                            <td>IPS</td>
                            <td><span class="badge badge-success">Tervalidasi</span></td>
                            <td><button class="action-btn">Detail</button></td>
                        </tr>
                        <tr>
                            <td class="text-slate-500 font-mono">ALM-1605</td>
                            <td class="font-semibold text-slate-800">Budi Santoso</td>
                            <td>2015</td>
                            <td>IPA</td>
                            <td><span class="badge badge-warning">Menunggu</span></td>
                            <td><button class="action-btn">Detail</button></td>
                        </tr>
                        <tr>
                            <td class="text-slate-500 font-mono">ALM-2304</td>
                            <td class="font-semibold text-slate-800">Dezan Glasovic</td>
                            <td>2022</td>
                            <td>IPS</td>
                            <td><span class="badge badge-success">Tervalidasi</span></td>
                            <td><button class="action-btn">Detail</button></td>
                        </tr>
                        <tr>
                            <td class="text-slate-500 font-mono">ALM-1802</td>
                            <td class="font-semibold text-slate-800">Siti Nurhaliza</td>
                            <td>2017</td>
                            <td>IPA</td>
                            <td><span class="badge badge-success">Tervalidasi</span></td>
                            <td><button class="action-btn">Detail</button></td>
                        </tr>
                    </tbody>
                </table>
                <div id="noDataResult" style="display: none; padding: 2rem; text-align: center; color: var(--text-muted);">
                    Data alumni tidak ditemukan.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple Client-Side Search Logic for Demonstration
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('alumniTable');
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');
        const noDataResult = document.getElementById('noDataResult');

        searchInput.addEventListener('keyup', function(e) {
            const term = e.target.value.toLowerCase();
            let hasVisibleRows = false;

            rows.forEach(row => {
                // Get text content of all cells in the row
                const text = row.textContent.toLowerCase();
                if (text.includes(term)) {
                    row.style.display = '';
                    hasVisibleRows = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide "No data" message and table headers appropriately
            if (hasVisibleRows) {
                table.style.display = 'table';
                noDataResult.style.display = 'none';
            } else {
                table.style.display = 'none';
                noDataResult.style.display = 'block';
            }
        });
    });
</script>
@endsection
