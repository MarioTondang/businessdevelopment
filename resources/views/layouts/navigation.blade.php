<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- SISI KIRI: Logo & Menu Navigasi Desktop -->
            <div class="flex items-center gap-8">
                <!-- Logo Mengarah ke Dashboard Admin -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('images/logo-bd.png') }}" alt="Logo Business Development" class="h-10 w-auto dark:invert transition-all duration-300">
                    <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white hidden sm:block">Business Development</span>
                </a>
                
                <!-- Navigation Links dengan Animasi Interaktif -->
                <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                    <!-- Manajemen Produk -->
                    <a href="{{ route('admin.products.index') }}" class="relative py-2 {{ request()->routeIs('admin.products.*') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }} transition-all duration-300 hover:-translate-y-0.5 group">
                        Manajemen Produk
                        <span class="absolute bottom-0 left-{{ request()->routeIs('admin.products.*') ? '0 w-full' : '1/2 w-0 group-hover:w-full group-hover:left-0' }} h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300"></span>
                    </a>
                    
                    <!-- Manajemen Penjual -->
                    <a href="{{ route('admin.sellers.index') }}" class="relative py-2 {{ request()->routeIs('admin.sellers.*') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }} transition-all duration-300 hover:-translate-y-0.5 group">
                        Manajemen Penjual
                        <span class="absolute bottom-0 left-{{ request()->routeIs('admin.sellers.*') ? '0 w-full' : '1/2 w-0 group-hover:w-full group-hover:left-0' }} h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300"></span>
                    </a>

                    <!-- Lihat Web -->
                    <a href="{{ route('welcome') }}" target="_blank" class="relative py-2 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white flex items-center gap-1.5 transition-all duration-300 hover:-translate-y-0.5 group">
                        Lihat Web 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-blue-600 dark:bg-blue-400 rounded-full transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                    </a>
                </div>
            </div>

            <!-- SISI KANAN: Dark Mode & Dropdown Profil Admin -->
            <div class="flex items-center gap-3">
                
                <!-- TOMBOL DARK MODE -->
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition">
                    <!-- Icon Matahari (Light) -->
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    <!-- Icon Bulan (Dark) -->
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </button>

                <!-- Dropdown Profil dengan Ikon Person & Logout -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition">
                            <!-- Icon Avatar Person Kecil -->
                            <div class="w-7 h-7 rounded-full bg-blue-600 text-white flex items-center justify-center mr-2 text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <span class="font-semibold">{{ Auth::user()->name ?? 'Admin Panitia' }}</span>
                            <div class="ml-1.5">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Menu Profil dengan Ikon Person -->
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 py-2.5">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ __('Profil') }}</span>
                        </x-dropdown-link>

                        <!-- Menu Keluar (Logout) dengan Ikon Exit -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2 py-2.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span>{{ __('Keluar') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <!-- Tombol Hamburger (Mobile Menu) -->
                <button id="admin-mobile-btn" type="button" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded-lg focus:outline-none transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Dropdown Menu Mobile Admin -->
    <div id="admin-mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-4 pt-2 pb-4 space-y-1 shadow-lg">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">Manajemen Produk</a>
        <a href="{{ route('admin.sellers.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">Manajemen Penjual</a>
        <a href="{{ route('welcome') }}" target="_blank" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">Lihat Web</a>
    </div>
</nav>

<!-- SCRIPT PENGGERAK DARK MODE & MOBILE ADMIN MENU -->
<script>
    // Toggle Mobile Admin Menu
    const adminMobileBtn = document.getElementById('admin-mobile-btn');
    const adminMobileMenu = document.getElementById('admin-mobile-menu');

    if (adminMobileBtn && adminMobileMenu) {
        adminMobileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            adminMobileMenu.classList.toggle('hidden');
        });
        document.addEventListener('click', function(event) {
            if (!adminMobileMenu.contains(event.target) && !adminMobileBtn.contains(event.target)) {
                adminMobileMenu.classList.add('hidden');
            }
        });
    }

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    }
</script>