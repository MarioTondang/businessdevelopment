<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
        {
            $products = Product::with(['category', 'seller'])->latest()->paginate(10);
            return view('admin.products.index', compact('products'));
        }
    /**
     * Menampilkan form untuk membuat produk baru.
     */
public function create()
    {
        $categories = \App\Models\Category::all();
        $sellers = \App\Models\Seller::all();
        return view('admin.products.create', compact('categories', 'sellers'));
    }
    
    
public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'seller_id' => 'required|exists:sellers,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi file gambar maksimal 2MB
        ]);

        // Buat slug otomatis dari nama produk
        $validated['slug'] = \Illuminate\Support\Str::slug($request->name) . '-' . uniqid();

        // Proses Upload Foto (jika ada file yang diunggah)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // Simpan ke database
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }  
    /**
     * Menampilkan detail satu produk.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
/**
     * Menampilkan form edit produk.
     */
    public function edit(Product $product)
    {
        // Ambil data kategori dan penjual untuk dropdown
        $categories = \App\Models\Category::all();
        $sellers = \App\Models\Seller::all();
        
        return view('admin.products.edit', compact('product', 'categories', 'sellers'));
    }

    /**
     * Menyimpan perubahan data produk ke database.
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'seller_id' => 'required|exists:sellers,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Proses ganti foto (jika user mengupload foto baru)
        if ($request->hasFile('image')) {
            // Hapus foto lama dari storage fisik jika ada
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
            }
            
            // Simpan foto baru dan masukkan path-nya ke array $validated
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // 3. Update database
        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Data produk berhasil diperbarui.');
    }
    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
        {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
        }
}