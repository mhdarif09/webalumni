<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Alumni Website') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold font-outfit text-[#34495E]">AlumniConnect</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        @auth
                            <a href="{{ url('/') }}" class="text-slate-600 hover:text-[#34495E] font-medium transition-colors">Beranda</a>
                            <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-[#34495E] font-medium transition-colors">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="bg-[#34495E] text-white px-5 py-2 rounded-full font-semibold hover:bg-[#2C3E50] transition-all shadow-lg shadow-slate-200">
                                    Keluar
                                </button>
                            </form>
                        @else
                            <a href="{{ url('/') }}" class="text-slate-600 hover:text-[#34495E] font-medium transition-colors">Beranda</a>
                            <a href="#" class="text-slate-600 hover:text-[#34495E] font-medium transition-colors">Lowongan</a>
                            <a href="#" class="text-slate-600 hover:text-[#34495E] font-medium transition-colors">Berita</a>
                            <a href="{{ route('login') }}" class="bg-[#34495E] text-white px-5 py-2 rounded-full font-semibold hover:bg-[#2C3E50] transition-all shadow-lg shadow-slate-200">Masuk</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-slate-900 text-slate-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <h3 class="text-xl font-bold font-outfit text-white mb-4">AlumniConnect</h3>
                        <p class="text-slate-400">Menghubungkan masa lalu untuk masa depan yang lebih baik.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Link Cepat</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-[#455A64]">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-[#455A64]">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Ikuti Kami</h4>
                        <div class="flex space-x-4">
                            <!-- Social Icons Placeholders -->
                        </div>
                    </div>
                </div>
                <div class="border-t border-slate-800 mt-12 pt-8 text-center text-sm">
                    &copy; {{ date('Y') }} AlumniConnect. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
