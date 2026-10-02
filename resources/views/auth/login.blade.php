<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - Business Development</title>

    <!-- Script Dark Mode Anti-Kedip -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-900 flex flex-col min-h-screen transition-colors duration-300">

<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40 transition-colors duration-300 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14 items-center">

            <a href="{{ route('welcome') }}" class="flex items-center gap-2 transition-all duration-300 hover:opacity-80">
                <img src="{{ asset('images/Logo-bd.png') }}" alt="Logo Business Development" class="h-10 sm:h-12 w-auto transition-all duration-300">
                <span class="font-bold text-lg tracking-tight text-gray-900 dark:text-white">Business Development</span>
            </a>

            <div class="flex items-center">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition">
                    <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </button>
            </div>
            
        </div>
    </div>
</nav>

    <div class="flex-1 flex items-center justify-center px-6 py-12 md:px-12">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <div class="space-y-10">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3">Visi & Misi</h1>
                    <p class="text-gray-500 dark:text-gray-400 text-sm md:text-base">Landasan pergerakan dalam membangun ekosistem wirausaha mahasiswa.</p>
                </div>

                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 flex items-center">
                            <span class="w-1.5 h-5 bg-blue-600 rounded-full mr-3"></span> Visi Utama
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-sm md:text-base pl-4.5">
                            Menjadi wadah pengembangan bisnis mahasiswa Manajemen Informatika untuk menciptakan bisnis inovatif yang menggabungkan kreativitas, teknologi, dan ilmu manajemen.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 flex items-center">
                            <span class="w-1.5 h-5 bg-blue-600 rounded-full mr-3"></span> Misi Strategis
                        </h3>
                        <ul class="list-disc list-outside ml-8 text-gray-600 dark:text-gray-400 space-y-2 text-sm md:text-base">
                            <li>Kami fokus meningkatkan skill mahasiswa melalui seminar dan membangun wadah kolaborasi untuk berbagi ide.</li>
                            <li>Tujuannya adalah membantu mahasiswa mewujudkan bisnis digital yang inovatif, dan membentuk mental profesional dan kreatif</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-md mx-auto lg:ml-auto bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-300">
                
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Login Admin</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Masukkan email dan password Anda.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm px-4 py-2.5 text-sm transition-colors" 
                               placeholder="admin@gmail.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                               class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm px-4 py-2.5 text-sm transition-colors" 
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <div class="block pt-2">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900 cursor-pointer" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                        </label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors active:scale-95 text-sm shadow-sm">
                            Masuk ke Dashboard
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <a href="{{ route('welcome') }}" class="text-sm text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        &larr; Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {

            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {

            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function() {
                // Toggle ikon
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // Toggle tema dokumen
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
</body>
</html>