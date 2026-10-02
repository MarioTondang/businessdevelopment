<x-app-layout>
    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Tambah Mahasiswa </h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Masukkan data lengkap mahasiswa yang ingin didaftarkan ke sistem.</p>
                </div>
                <a href="{{ route('admin.sellers.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                    &larr; Kembali
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
                <form action="{{ route('admin.sellers.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim') }}" class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: 2405102060">
                        @error('nim') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Nama mahasiswa...">
                        @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">Jurusan</label>
                            <input type="text" name="jurusan" value="{{ old('jurusan') }}" required class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: Teknik Komputer dan Informatika">
                            @error('jurusan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">Program Studi (Prodi)</label>
                            <input type="text" name="major" value="{{ old('major') }}" required class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: Manajemen Informatika">
                            @error('major') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">Kelas</label>
                        <input type="text" name="kelas" value="{{ old('kelas') }}" class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: 4A / Regular">
                        @error('kelas') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400 mb-1">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: 6281234567890">
                        <p class="text-[11px] text-gray-400 mt-1">Gunakan awalan 62 tanpa tanda plus (+) atau nol di depan.</p>
                        @error('whatsapp_number') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 flex justify-end gap-3 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.sellers.index') }}" class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-5 py-2.5 rounded-lg text-sm font-medium transition hover:bg-gray-200 dark:hover:bg-gray-600">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">Simpan Data</button>
                    </div>
                </form>
                                <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                                &copy; 2026 BusineesDevelopment.
                        </div>
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>