<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap inputan pencarian
        $search = $request->input('search');

        // Buat query dasar untuk produk (urutkan yang terbaru)
        $query = Product::with(['seller', 'category'])->latest();

        // Jika ada inputan pencarian, filter berdasarkan nama produk
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Ambil data produk (pakai paginate agar tabel tidak memanjang ke bawah)
        $products = $query->paginate(10); 

        // Ambil data untuk card ringkasan di atas
        $totalSellers = Seller::count();
        $totalProducts = Product::count();

        // Kirim data ke view dashboard (pastikan nama view-nya sesuai, misalnya 'dashboard')
        return view('dashboard', compact('products', 'search', 'totalSellers', 'totalProducts'));
    }
}