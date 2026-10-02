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
    <title>{{ $product->name }} - Business Development</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300 min-h-screen flex flex-col">
    <!-- Navbar Publik Konsisten -->
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/Logo-bd.png') }}" alt="Logo Business Development" class="h-10 sm:h-12 w-auto transition-all duration-300">
                    <span class="font-bold text-lg tracking-tight text-gray-900 dark:text-white">Business Development</span>
                </div>
                
                <!-- Navigasi Kanan -->
                <div class="flex items-center gap-4">
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

                        <a href="{{ route('sellers.index') }}" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5 group">
                            Daftar Usaha
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
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
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-4 pt-2 pb-4 space-y-2 shadow-lg">
            <a href="{{ route('welcome') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Beranda</a>
            <a href="{{ route('welcome') }}#profil-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Tentang Kami</a>
            <a href="{{ route('welcome') }}#kategori-section" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Katalog</a>
            <a href="{{ route('sellers.index') }}" class="mobile-link block px-3 py-2 rounded-md text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Daftar Usaha</a>
        </div>
    </nav>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16 flex-1 w-full">
        <nav class="mb-8 lg:mb-12">
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Katalog
            </a>
        </nav>

        <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <div class="lg:col-span-7">
                <div class="aspect-square sm:aspect-[4/3] lg:aspect-square bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl ring-1 ring-gray-900/5 dark:ring-white/10 transition-all">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-500">
                    @else
                        <img src="https://placehold.co/800x800/e2e8f0/64748b?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center">
                    @endif
                </div>
            </div>
            <div class="mt-10 px-2 sm:px-0 lg:mt-0 lg:col-span-5 flex flex-col justify-center">

                <h2 class="text-xs font-bold tracking-widest uppercase text-blue-600 dark:text-blue-400 mb-3">{{ $product->category->name }}</h2>
                
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white leading-tight mb-4">
                    {{ $product->name }}
                </h1>

                <div class="flex items-center mt-2">
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Deskripsi Produk</h3>
                    <div class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                        {{ $product->description ?? 'Tidak ada deskripsi rinci yang ditambahkan untuk produk ini.' }}
                    </div>
                </div>

                <div class="mt-10 bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700 shadow-sm flex items-center justify-between gap-4 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-inner shrink-0">
                            {{ strtoupper(substr($product->seller->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">Penjual</p>
                            <h4 class="font-bold text-base text-gray-900 dark:text-white">{{ $product->seller->name }}</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->seller->major }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="https://wa.me/{{ $product->seller->whatsapp_number }}?text=Halo%20{{ urlencode($product->seller->name) }},%20saya%20tertarik%20dengan%20produk%20*{{ urlencode($product->name) }}*%20di%20KatalogKampus." target="_blank" class="w-full bg-green-500 hover:bg-green-600 active:bg-green-700 text-white font-bold py-4 px-8 rounded-xl text-lg text-center transition-all flex items-center justify-center gap-3 shadow-lg shadow-green-500/30">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Pesan Sekarang via WhatsApp
                    </a>
                </div>

            </div>
        </div>
    </main>


                <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                                &copy; 2026 BusineesDevelopment.
                        </div>
                </footer>
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