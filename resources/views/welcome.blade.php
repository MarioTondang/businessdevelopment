<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Script Dark Mode Anti-Kedip -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Development - Katalog Wirausaha Mahasiswa</title>
    @vite('resources/css/app.css')
    <meta name="description" content="Pusat inkubator wirausaha mahasiswa dan katalog produk kreatif kampus.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .product-img-wrapper {
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }
        .product-img {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .group:hover .product-img {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300 flex flex-col min-h-screen">

    <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2 animate-fade-in-up" style="animation-delay: 100ms;">
                    <img src="{{ asset('images/Logo-bd.png') }}" alt="Logo Business Development" class="h-10 sm:h-12 w-auto transition-all duration-300">
                    <span class="font-bold text-lg tracking-tight text-gray-900 dark:text-white">Business Development</span>
                </div>
                
                <!-- Navigasi Kanan -->
                <div class="flex items-center gap-4 animate-fade-in-up" style="animation-delay: 200ms;">
                    <div class="hidden md:flex space-x-6 text-sm font-medium">
                        <a href="{{ route('welcome') }}" class="relative py-2 text-blue-600 dark:text-blue-400 font-semibold transition-all duration-300 hover:-translate-y-0.5">
                            Beranda
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full"></span>
                        </a>

                        <a href="#profil-section" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Tentang Kami
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>

                        <a href="#kategori-section" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Katalog
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>

                        <a href="{{ route('sellers.index') }}" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Daftar Usaha
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>
                    </div>

                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition">
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707-.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>


                    <button id="mobile-menu-button" type="button" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded-lg focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>


        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-4 pt-2 pb-4 space-y-2 shadow-lg">
            <a href="{{ route('welcome') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-semibold text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700/50">Beranda</a>
            <a href="#profil-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Tentang Kami</a>
            <a href="#kategori-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Katalog</a>
            <a href="{{ route('sellers.index') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Daftar Usaha</a>
        </div>
    </nav>

    <section id="profil-section" class="py-16 md:py-24 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 text-center animate-fade-in-up">
            <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gray-100 dark:bg-gray-700 p-3.5 border border-gray-200 dark:border-gray-600 shadow-sm flex items-center justify-center">
                <img src="{{ asset('images/Logo-bd.png') }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight mb-4">
                Business Development <span class="text-blue-600 dark:text-blue-400">Official</span>
            </h1>
            
            <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto mb-8">
                Wadah resmi pengembangan bisnis, inkubator kreativitas, dan kolaborasi wirausaha mahasiswa di bawah naungan Himpunan Program Studi Manajemen Informatika. 
            </p>

            <div class="flex flex-wrap justify-center items-center gap-4 mb-16">
                <!-- Instagram Official -->
                <a href="https://www.instagram.com/bussinessdevelopmentmi?stkn=aGczdTFxM2U0bG1j" target="_blank" class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-pink-50 hover:bg-pink-100 dark:bg-pink-950/40 dark:hover:bg-pink-900/50 text-pink-600 dark:text-pink-400 border border-pink-200 dark:border-pink-800/50 text-sm font-semibold transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    <span>business development</span>
                </a>

                <a href="https://wa.me/6289508721206?text=Halo%20Admin%20Business%20Development,%20saya%20ingin%20bertanya%20mengenai%20kegiatan%20organisasi." target="_blank" class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-green-950/40 dark:hover:bg-green-900/50 text-green-600 dark:text-green-400 border border-green-200 dark:border-green-800/50 text-sm font-semibold transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    <span>business development</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-left pt-10 border-t border-gray-100 dark:border-gray-700/60">
                <div class="space-y-3">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white flex items-center">
                        <span class="w-1.5 h-5 bg-blue-600 rounded-full mr-3"></span> Visi 
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed pl-4.5">
                        "Menjadi wadah pengembangan bisnis mahasiswa Manajemen Informatika untuk menciptakan bisnis inovatif yang menggabungkan kreativitas, teknologi, dan ilmu manajemen."
                    </p>
                </div>

                <div class="space-y-3">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white flex items-center">
                        <span class="w-1.5 h-5 bg-blue-600 rounded-full mr-3"></span> Misi 
                    </h3>
                    <ul class="text-gray-600 dark:text-gray-400 text-sm space-y-2 pl-4.5 list-disc list-inside">
                        <li>Kami fokus meningkatkan skill mahasiswa melalui seminar dan membangun wadah kolaborasi untuk berbagi ide. </li>
                        <li>Tujuannya adalah membantu mahasiswa mewujudkan bisnis digital yang inovatif, dan membentuk mental profesional dan kreatif.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-4 py-10 w-full">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Rekomendasi Minggu Ini</h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-0.5">Pilihan Produk Terbaru</p>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            @foreach($recommendedProducts as $product)
            <a href="{{ route('product.show', $product->slug) }}" class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-3.5 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="product-img-wrapper rounded-xl bg-gray-100 dark:bg-gray-900 mb-3 relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img w-full h-full object-cover">
                        @else
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text={{ substr(urlencode($product->name), 0, 3) }}" class="product-img w-full h-full object-cover">
                        @endif
                        <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-md text-white text-[10px] font-semibold px-2 py-0.5 rounded-md">
                            {{ $product->category->name ?? 'Umum' }}
                        </span>
                    </div>

                    <h3 class="text-sm font-bold text-gray-900 dark:text-white truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        {{ $product->name }}
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 truncate">
                        Oleh: {{ $product->seller->name ?? 'Anonim' }}
                    </p>
                </div>

                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-between">
                    <span class="text-xs sm:text-sm font-extrabold text-blue-600 dark:text-blue-400">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-xs font-medium text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors flex items-center gap-1">
                        Detail &rarr;
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <div id="kategori-section" class="max-w-7xl mx-auto px-4 py-8 flex-1 w-full">
        <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Katalog Produk Mahasiswa</h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-0.5">Temukan berbagai produk kreatif karya mahasiswa.</p>
            </div>

            <!-- Form Pencarian Publik -->
            <form action="{{ route('welcome') }}" method="GET" class="w-full md:w-80 flex items-center gap-2">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}" 
                           placeholder="Cari produk atau penjual..." 
                           class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 shadow-sm transition-all placeholder-gray-400 dark:placeholder-gray-500" autocomplete="off">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm px-5 py-2.5 shadow-sm transition-all active:scale-95 shrink-0">
                    Cari
                </button>
                @if(!empty($search))
                    <a href="{{ route('welcome') }}" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 p-2.5 rounded-xl transition-all flex items-center justify-center shrink-0" title="Reset">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </a>
                @endif
            </form>
        </div>

        <!-- Filter Kategori & Prodi -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-5 mb-8 shadow-sm space-y-4">
            <!-- Filter Kategori -->
            <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider shrink-0">Kategori:</span>
                <a href="{{ route('welcome', array_merge(request()->except(['category', 'page']), ['category' => null])) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition shrink-0 {{ empty($categorySlug) ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                <a href="{{ route('welcome', array_merge(request()->except(['category', 'page']), ['category' => $category->slug])) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition shrink-0 {{ $categorySlug === $category->slug ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>

            <!-- Filter Program Studi -->
            <div class="flex items-center gap-3 overflow-x-auto pt-2 border-t border-gray-100 dark:border-gray-700/60 pb-1 scrollbar-hide">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider shrink-0">Prodi:</span>
                <a href="{{ route('welcome', array_merge(request()->except(['major', 'page']), ['major' => null])) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition shrink-0 {{ empty($major) ? 'bg-indigo-600 text-white shadow-sm' : 'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    Semua
                </a>
                @foreach($majors as $m)
                    @if(!empty($m))
                    <a href="{{ route('welcome', array_merge(request()->except(['major', 'page']), ['major' => $m])) }}" 
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition shrink-0 {{ $major === $m ? 'bg-indigo-600 text-white shadow-sm' : 'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        {{ $m }}
                    </a>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- ================= GRID KARTU PRODUK UTAMA ================= -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div onclick="window.location.href='{{ route('product.show', $product->slug) }}';" class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between cursor-pointer">
                <div>
                    <div class="product-img-wrapper rounded-xl bg-gray-100 dark:bg-gray-900 mb-4 relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img w-full h-full object-cover">
                        @else
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text={{ substr(urlencode($product->name), 0, 3) }}" class="product-img w-full h-full object-cover">
                        @endif
                        <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-md text-white text-[10px] font-semibold px-2.5 py-1 rounded-md uppercase tracking-wider">
                            {{ $product->category->name ?? 'Umum' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1.5">
                        <span class="font-medium truncate">Oleh: {{ $product->seller->name ?? 'Anonim' }}</span>
                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-2 py-0.5 rounded text-[10px] font-semibold shrink-0">
                            {{ $product->seller->major ?? 'Umum' }}
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-gray-900 dark:text-white mb-2 truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        {{ $product->name }}
                    </h3>
                </div>

                <div class="pt-4 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-between gap-3">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-gray-400 block">Harga</span>
                        <span class="text-sm sm:text-base font-black text-blue-600 dark:text-blue-400">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <a href="https://wa.me/{{ $product->seller->whatsapp_number }}?text={{ urlencode('Halo Kak ' . $product->seller->name . ', saya tertarik ingin memesan produk *' . $product->name . '* (Rp ' . number_format($product->price, 0, ',', '.') . ') yang ada di katalog Business Development. Apakah stoknya masih tersedia?' . ($product->image ? "\n\nLink Foto Produk: " . asset('storage/' . $product->image) : '')) }}" 
                       target="_blank" 
                       onclick="event.stopPropagation();" 
                       class="bg-green-50 hover:bg-green-100 dark:bg-green-950/40 dark:hover:bg-green-900/50 text-green-600 dark:text-green-400 p-2.5 rounded-xl transition-colors border border-green-200 dark:border-green-800/50 flex items-center justify-center shrink-0" 
                       title="Pesan via WhatsApp">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 text-gray-400 border border-dashed border-gray-300 dark:border-gray-700 rounded-2xl">
                Tidak ada produk yang ditemukan.
            </div>
            @endforelse
        </div>
    </div>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
            &copy; 2026 BusinessDevelopment.
        </div>
    </footer>

    <!-- ================= SCRIPT ================= -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
            });

            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 50);
                });
            });

            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {
            themeToggleLightIcon.classList.add('hidden');
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            });
        }
    </script>
</body>
</html>