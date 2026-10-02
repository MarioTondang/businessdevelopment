<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Usaha Mahasiswa - KatalogKampus.</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded text-white flex items-center justify-center font-bold text-sm">
                        BD
                    </div>
                    <a href="{{ route('welcome') }}" class="font-bold text-lg tracking-tight">KatalogKampus.</a>
                </div>
                <div class="hidden md:flex space-x-6 text-sm font-medium">
                    <a href="{{ route('welcome') }}" class="text-gray-500 hover:text-gray-900 transition py-4">Beranda</a>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Halaman -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-3">Direktori Usaha Mahasiswa</h1>
            <p class="text-gray-500 max-w-2xl mx-auto text-sm md:text-base">Dukung kreativitas dan jiwa kewirausahaan mahasiswa. Temukan berbagai produk dan layanan menarik yang ditawarkan langsung oleh talenta kampus kita.</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full flex-grow">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($sellers as $seller)
            <!-- Card Profil Penjual (Diperbaiki Strukturnya) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center text-center hover:shadow-md transition-shadow">
                
                <!-- Avatar Inisial yang Rapi di Tengah -->
                <div class="w-16 h-16 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-2xl shadow-sm mb-4">
                    {{ substr($seller->name, 0, 1) }}
                </div>
                
                <!-- Info Penjual -->
                <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">{{ $seller->name }}</h3>
                <p class="text-xs font-medium text-gray-500 mb-4">{{ $seller->major }}</p>
                
                <!-- Badge Jumlah Produk -->
                <div class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 rounded-md text-xs font-semibold mb-6">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    {{ $seller->products_count }} Produk Tersedia
                </div>
                
                <!-- Tombol Aksi -->
                <div class="w-full mt-auto">
                    <a href="https://wa.me/{{ $seller->whatsapp_number }}" target="_blank" class="w-full py-2 bg-gray-50 hover:bg-green-50 text-gray-700 hover:text-green-700 border border-gray-200 hover:border-green-200 rounded-lg text-xs font-semibold transition flex items-center justify-center gap-2">
                        Hubungi Penjual
                    </a>
                </div>

            </div>
            @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada penjual terdaftar</h3>
                <p class="text-gray-500 text-sm">Data mahasiswa akan muncul di sini.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($sellers, 'hasPages') && $sellers->hasPages())
        <div class="mt-10">
            {{ $sellers->links() }}
        </div>
        @endif

    </main>

    <!-- Footer -->
                <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                                &copy; 2026 BusineesDevelopment.
                        </div>
                </footer>

</body>
</html>