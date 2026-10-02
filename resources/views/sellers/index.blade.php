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
    <title>Daftar Mahasiswa & Usaha - Business Development</title>
    @vite('resources/css/app.css')
    <meta name="description" content="Kenali mahasiswa wirausaha di balik produk-produk kreatif kampus kita.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Animasi Mulus */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300 flex flex-col min-h-screen">

    <!-- Navbar Publik Konsisten -->
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
                        <a href="{{ route('welcome') }}" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Beranda
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>

                        <a href="{{ route('welcome') }}#profil-section" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Tentang Kami
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>

                        <a href="{{ route('welcome') }}#kategori-section" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Katalog
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>

                        <a href="{{ route('sellers.index') }}" class="relative py-2 text-blue-600 dark:text-blue-400 font-semibold transition-all duration-300 hover:-translate-y-0.5">
                            Daftar Usaha
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full"></span>
                        </a>
                    </div>

                    <!-- Tombol Dark Mode Sinkron -->
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition">
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>

                    <!-- Hamburger Mobile -->
                    <button id="mobile-menu-button" type="button" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded-lg focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dropdown Mobile -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-4 pt-2 pb-4 space-y-2 shadow-lg">
            <a href="{{ route('welcome') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Beranda</a>
            <a href="{{ route('welcome') }}#profil-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Tentang Kami</a>
            <a href="{{ route('welcome') }}#kategori-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Katalog</a>
            <a href="{{ route('sellers.index') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-semibold text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700/50">Daftar Usaha</a>
        </div>
    </nav>

    <!-- Header Halaman -->
    <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 pt-12 pb-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 text-center animate-fade-in-up" style="animation-delay: 200ms;">
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-3 text-gray-900 dark:text-white">
                Direktori Mahasiswa & Usaha
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm md:text-base max-w-xl mx-auto">
                Kenali mahasiswa di balik produk-produk kreatif di lingkungan kampus.
            </p>
        </div>
    </header>

    <!-- Konten Utama: Daftar Kartu Penjual -->
    <main class="max-w-7xl mx-auto px-4 py-10 flex-1 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($sellers as $seller)
            <!-- Card Penjual -->
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/80 rounded-2xl p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 animate-fade-in-up flex flex-col justify-between" style="animation-delay: {{ ($loop->index * 100) + 300 }}ms;">
                
                <div>
                    <!-- Profil Singkat Penjual -->
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white font-black text-xl flex items-center justify-center shrink-0 shadow-md shadow-blue-500/20">
                            {{ strtoupper(substr($seller->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $seller->name }}</h3>
                            <p class="text-xs font-semibold text-blue-600 dark:text-blue-400 mt-0.5">
                                {{ $seller->jurusan ?? '-' }} — {{ $seller->major }}
                            </p>
                            @if($seller->kelas)
                                <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Kelas: {{ $seller->kelas }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Produk yang Dijual oleh Mahasiswa Ini -->
                    <div class="mb-4">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 mb-3">
                            Produk yang Dijual ({{ $seller->products->count() }})
                        </p>
                        
                        @if($seller->products->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($seller->products as $product)
                                <a href="{{ route('product.show', $product->slug) }}" class="group flex items-center gap-3 bg-gray-50 dark:bg-gray-900/50 p-2.5 rounded-xl border border-gray-100 dark:border-gray-700/70 hover:border-blue-400 dark:hover:border-blue-500 transition-colors">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 bg-gray-200 dark:bg-gray-800">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <img src="https://placehold.co/100x100/e2e8f0/64748b?text={{ substr(urlencode($product->name), 0, 3) }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div class="overflow-hidden">
                                        <h4 class="text-xs font-bold truncate text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $product->name }}</h4>
                                        <p class="text-xs font-black text-blue-600 dark:text-blue-400 mt-0.5">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-xs text-gray-400 italic bg-gray-50 dark:bg-gray-900/30 p-3 rounded-xl text-center">
                                Belum ada produk yang di-upload oleh mahasiswa ini.
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Tombol Hubungi WhatsApp -->
                <div class="pt-4 border-t border-gray-100 dark:border-gray-700/80">
                    <a href="https://wa.me/{{ $seller->whatsapp_number }}?text=Halo%20{{ urlencode($seller->name) }},%20saya%20melihat%20profil%20Anda%20di%20KatalogKampus%20dan%20tertarik%20dengan%20produk%20Anda." target="_blank" class="w-full flex items-center justify-center gap-2 bg-green-50 hover:bg-green-100 dark:bg-green-950/40 dark:hover:bg-green-900/50 text-green-600 dark:text-green-400 font-semibold py-2.5 px-4 rounded-xl text-sm transition-colors border border-green-200 dark:border-green-800/50">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        <span>Hubungi Penjual (WhatsApp)</span>
                    </a>
                </div>

            </div>
            @endforeach
        </div>

        @if($sellers->isEmpty())
        <div class="text-center py-20 text-gray-500 dark:text-gray-400 border border-dashed border-gray-300 dark:border-gray-700 rounded-2xl animate-fade-in-up">
            <p class="text-sm">Belum ada data mahasiswa yang terdaftar.</p>
        </div>
        @endif
    </main>

    <!-- Footer -->
                <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                                &copy; 2026 BusineesDevelopment.
                        </div>
                </footer>

    <!-- Script Penggerak & Sinkronisasi Tombol Dark Mode -->
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

        // Sinkronisasi ikon saat halaman dimuat
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