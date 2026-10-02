<x-app-layout>
    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-green-50 dark:bg-green-950/50 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg text-sm flex items-center justify-between shadow-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Manajemen Penjual</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Kelola data mahasiswa yang terdaftar pada sistem.</p>
                </div>
                <a href="{{ route('admin.sellers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition text-sm flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Data Mahasiswa
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden shadow-sm transition-colors duration-300">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 text-xs font-semibold uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">
                                <th class="py-3.5 px-6">NIM</th>
                                <th class="py-3.5 px-6">Nama Lengkap</th>
                                <th class="py-3.5 px-6">Jurusan / Prodi</th>
                                <th class="py-3.5 px-6 text-center">Kelas</th>
                                <th class="py-3.5 px-6 text-center">WhatsApp</th>
                                <th class="py-3.5 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300 text-sm divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($sellers as $seller)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/50 transition">
                                    <td class="py-3.5 px-6 font-medium text-gray-900 dark:text-white">
                                        {{ $seller->nim ?? '-' }}
                                    </td>
                                    <td class="py-3.5 px-6 font-bold text-gray-900 dark:text-white">
                                        {{ $seller->name }}
                                    </td>
                                    <td class="py-3.5 px-6 text-gray-600 dark:text-gray-300">
                                        <div>{{ $seller->jurusan ?? '-' }}</div>
                                        <div class="text-xs text-gray-400 dark:text-gray-400">{{ $seller->major }}</div>
                                    </td>
                                    <td class="py-3.5 px-6 text-center">
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2.5 py-1 rounded-md text-xs font-semibold">{{ $seller->kelas ?? '-' }}</span>
                                    </td>
                                    <td class="py-3.5 px-6 text-center">
                                        <a href="https://wa.me/{{ $seller->whatsapp_number }}" target="_blank" class="text-green-600 dark:text-green-400 hover:underline font-medium">
                                            {{ $seller->whatsapp_number }}
                                        </a>
                                    </td>
                                    <td class="py-3.5 px-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.sellers.edit', $seller->id) }}" class="p-1.5 bg-gray-100 dark:bg-gray-700 hover:bg-amber-50 dark:hover:bg-amber-950/50 hover:text-amber-600 text-gray-600 dark:text-gray-300 rounded-md transition" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <form action="{{ route('admin.sellers.destroy', $seller->id) }}" method="POST" class="inline" onsubmit="return confirm('PERINGATAN: Menghapus mahasiswa ini juga akan menghapus SEMUA PRODUK miliknya. Anda yakin?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 bg-gray-100 dark:bg-gray-700 hover:bg-red-50 dark:hover:bg-red-950/50 hover:text-red-600 text-gray-600 dark:text-gray-300 rounded-md transition" title="Hapus">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-gray-400 dark:text-gray-500 text-sm font-medium">
                                        Belum ada data mahasiswa yang mendaftar usaha.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($sellers, 'hasPages') && $sellers->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    {{ $sellers->links() }}
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