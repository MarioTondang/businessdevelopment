<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Produk</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui detail informasi atau foto produk ini.</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 sm:p-8">

                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                            
                            <!-- Nama Produk -->
                            <div class="col-span-2 md:col-span-1">
                                <label for="name" class="block font-semibold text-gray-900 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" required value="{{ old('name', $product->name) }}"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-sans">
                            </div>

                            <!-- Harga -->
                            <div class="col-span-2 md:col-span-1">
                                <label for="price" class="block font-semibold text-gray-900 mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                                <input type="number" name="price" id="price" required value="{{ old('price', $product->price) }}"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-sans">
                            </div>

                            <!-- Penjual -->
                            <div class="col-span-2 md:col-span-1">
                                <label for="seller_id" class="block font-semibold text-gray-900 mb-2">Penjual (Mahasiswa) <span class="text-red-500">*</span></label>
                                <select name="seller_id" id="seller_id" required
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-sans cursor-pointer">
                                    @foreach($sellers as $seller)
                                        <option value="{{ $seller->id }}" {{ (old('seller_id', $product->seller_id) == $seller->id) ? 'selected' : '' }}>
                                            {{ $seller->name }} ({{ $seller->major }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kategori -->
                            <div class="col-span-2 md:col-span-1">
                                <label for="category_id" class="block font-semibold text-gray-900 mb-2">Kategori <span class="text-red-500">*</span></label>
                                <select name="category_id" id="category_id" required
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-sans cursor-pointer">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                            <textarea name="description" id="description" rows="4" required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-sans">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Foto Produk -->
                        <div class="border border-gray-200 rounded-lg p-5 bg-gray-50/50">
                            <label class="block text-sm font-semibold text-gray-900 mb-4">Foto Produk</label>
                            <div class="flex flex-col sm:flex-row items-start gap-5">
                                <!-- Preview Foto Lama -->
                                <div class="shrink-0 relative group">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Preview" class="w-24 h-24 object-cover rounded-lg border border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-24 h-24 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center text-xs text-gray-400 font-bold shadow-sm">
                                            NO IMG
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Input Ganti Foto (Gaya Standar Lintas Browser) -->
                                <div class="flex-1 w-full">
                                    <div class="relative w-full border-2 border-dashed border-gray-300 rounded-lg px-4 py-5 bg-white text-center hover:bg-gray-50 transition-colors">
                                        <input type="file" name="image" id="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div class="text-gray-500 text-sm font-medium">
                                            <span class="text-blue-600 font-bold underline">Pilih file baru</span> atau tarik file ke sini
                                        </div>
                                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah foto. Maks: 2MB.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end gap-3 pt-6 mt-4 border-t border-gray-100">
                            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-bold text-gray-700 hover:bg-gray-50 transition shadow-sm font-sans">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-blue-600 border border-transparent rounded-lg text-sm font-bold text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-500/30 transition shadow-sm flex items-center gap-2 font-sans">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-6 mt-auto transition-colors duration-300">
                        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 dark:text-gray-400 text-xs">
                            &copy; 2026 BusineesDevelopment.
                        </div>
                        </footer>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>