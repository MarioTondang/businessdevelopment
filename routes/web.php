<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellerController;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

// ==========================================
// --- ROUTE PENGUNJUNG (FRONTEND) ---
// ==========================================

Route::get('/', function (Request $request) {
    $search = $request->input('search');
    $categorySlug = $request->input('category'); 
    $major = $request->input('major'); 

    $categories = \App\Models\Category::all();
    $majors = Seller::select('major')->distinct()->pluck('major');

    $query = Product::with(['category', 'seller']);

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%')
              ->orWhereHas('seller', function ($q) use ($search) {
                  $q->where('name', 'like', '%' . $search . '%');
              });
    }

    if ($categorySlug) {
        $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    if ($major) {
        $query->whereHas('seller', function ($q) use ($major) {
            $q->where('major', $major);
        });
    }

    $products = $query->latest()->get();
    
    // Ambil 4 produk untuk rekomendasi
    $recommendedProducts = Product::with(['category', 'seller'])->inRandomOrder()->take(4)->get();
    
    return view('welcome', compact('products', 'search', 'categories', 'categorySlug', 'majors', 'major', 'recommendedProducts'));
})->name('welcome');


Route::get('/produk/{slug}', function ($slug) {
    $product = Product::with(['category', 'seller'])->where('slug', $slug)->firstOrFail();
    return view('product-detail', compact('product'));
})->name('product.show');


// --- ROUTE DIREKTORI MAHASISWA / PENJUAL (PUBLIK) ---
Route::get('/sellers', function () {
    $sellers = Seller::with('products')->orderBy('name', 'asc')->paginate(12);
    return view('sellers.index', compact('sellers'));
})->name('sellers.index');


// ==========================================
// --- ROUTE ADMIN (BACKEND) ---
// ==========================================

// Menggunakan DashboardController untuk menangani fitur pencarian
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Grup Route Admin (Produk & Penjual di dalam panel admin)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('sellers', SellerController::class);
});

// Manajemen Profil Pengguna / Admin
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';