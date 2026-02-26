<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Masyarakat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 shadow-xl hidden md:flex flex-col fixed inset-y-0">
            <div class="p-6 text-white text-2xl font-bold border-b border-gray-800">
                Aduan Rakyat
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->is('dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <i class="bi bi-speedometer2 text-xl mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('kategori.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->is('kategori*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <i class="bi bi-tags text-xl mr-3"></i>
                    <span class="font-medium">Kategori</span>
                </a>

                <a href="{{ route('laporan.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->is('laporan*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <i class="bi bi-file-earmark-text text-xl mr-3"></i>
                    <span class="font-medium">Laporan</span>
                </a>
                <a href="{{ route('rekap.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->is('rekap*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <i class="bi bi-file-earmark-text text-xl mr-3"></i>
                    <span class="font-medium">Cetak Laporan</span>
                </a>
            </nav>

        
        </aside>

        <div class="flex-1 flex flex-col md:ml-64 min-h-screen">
            
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-20 shadow-sm">
                <div class="font-bold text-gray-700 uppercase tracking-widest text-sm"></div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-xs text-gray-400 leading-none">Selamat Datang,</p>
                        <p class="text-sm font-bold text-gray-700">{{ auth()->user()->name ?? 'Petugas' }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold border border-blue-200">
                        {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                    </div>
                </div>
            </header>

            <main class="p-6 md:p-10 bg-gray-50 flex-grow">
                @yield('content')
            </main>

            <footer class="p-6 text-center text-gray-400 text-xs border-t border-gray-100 bg-white">
                &copy; 2024 Sistem Pengaduan Masyarakat - Terlapor & Teratasi.
            </footer>
        </div>

        <div class="md:hidden fixed bottom-0 w-full bg-gray-900 border-t border-gray-800 flex justify-around p-3 z-50">
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'text-blue-500' : 'text-gray-500' }}">
                <i class="bi bi-speedometer2 text-xl"></i>
            </a>
            <a href="{{ route('kategori.index') }}" class="{{ request()->is('kategori*') ? 'text-blue-500' : 'text-gray-500' }}">
                <i class="bi bi-tags text-xl"></i>
            </a>
            <a href="{{ route('laporan.index') }}" class="{{ request()->is('laporan*') ? 'text-blue-500' : 'text-gray-500' }}">
                <i class="bi bi-file-earmark-text text-xl"></i>
            </a>
        </div>
    </div>
</body>
</html>