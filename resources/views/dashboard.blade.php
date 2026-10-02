<x-app-layout>
    <!-- CSS Animasi Khusus Dashboard -->
    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
    </style>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- 1. Banner Welcome (Mendarat Pertama) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 animate-fade-in-up" style="animation-delay: 100ms;">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        Selamat Datang di Panel Admin, {{ Auth::user()->name ?? 'Admin Panitia' }}! 
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Berikut adalah ringkasan data KatalogKampus Business Development hari ini.</p>
                </div>
                <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm flex items-center gap-2 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Produk
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Card Mahasiswa -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 border-l-4 border-l-blue-500 flex items-center gap-5 animate-fade-in-up hover:-translate-y-1 hover:shadow-md transition-all duration-300" style="animation-delay: 200ms;">
                    <div class="w-14 h-14 rounded-full bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-500 dark:text-gray-400 tracking-wider uppercase mb-1">Total Mahasiswa (Penjual)</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalSellers ?? 0 }}</h3>
                    </div>
                </div>

                <!-- Card Produk -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 border-l-4 border-l-green-500 flex items-center gap-5 animate-fade-in-up hover:-translate-y-1 hover:shadow-md transition-all duration-300" style="animation-delay: 300ms;">
                    <div class="w-14 h-14 rounded-full bg-green-50 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400 shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-500 dark:text-gray-400 tracking-wider uppercase mb-1">Total Produk Aktif</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalProducts ?? 0 }}</h3>
                    </div>
                </div>

            </div>

            <!-- 3. Tabel Produk & Pencarian (Mendarat Terakhir) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden animate-fade-in-up" style="animation-delay: 400ms;">
                
                <!-- Header Tabel & Form Pencarian -->
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white transition-colors duration-300">
                        @if(!empty($search))
                            Hasil Pencarian: <span class="text-blue-600 dark:text-blue-400">"{{ $search }}"</span>
                        @else
                            Daftar Produk
                        @endif
                    </h2>

                    <!-- Form Pencarian Admin -->
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full md:w-auto flex items-center gap-2">
                        <div class="relative w-full md:w-72">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" name="search" value="{{ $search ?? '' }}" 
                                placeholder="Cari nama produk..." 
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 shadow-sm transition-all duration-300 placeholder-gray-400 dark:placeholder-gray-500" 
                                autocomplete="off">
                        </div>
                        
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm px-5 py-2.5 shadow-sm transition-all active:scale-95">
                            Cari
                        </button>
                        
                        @if(!empty($search))
                            <a href="{{ route('dashboard') }}" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 font-medium rounded-xl text-sm p-2.5 shadow-sm transition-all active:scale-95 flex items-center justify-center" title="Reset Pencarian">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </a>
                        @endif
                    </form>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama Produk</th>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Penjual</th>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Loop Data Produk dari Controller -->
                            @forelse($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700 shrink-0 border border-gray-200 dark:border-gray-600">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            @else
                                                <img src="https://placehold.co/100x100/e2e8f0/64748b?text={{ substr(urlencode($product->name), 0, 3) }}" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white text-sm">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $product->seller->name ?? 'Anonim' }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-[11px] font-semibold tracking-wide rounded-md">
                                        {{ $product->category->name ?? 'Umum' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400 text-sm">
                                    @if(!empty($search))
                                        Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                                    @else
                                        Belum ada produk yang didaftarkan.
                                    @endif
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($products->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    {{ $products->appends(['search' => $search])->links() }}
                </div>
                @endif
                <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                                &copy; 2026 BusineesDevelopment.
                        </div>
                </footer>
            </div>
            
        </div>
    </div>
</x-app-layout>