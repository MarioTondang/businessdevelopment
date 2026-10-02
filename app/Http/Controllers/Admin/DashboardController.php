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
        
        $search = $request->input('search');

        
        $query = Product::with(['seller', 'category'])->latest();

        
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        
        $products = $query->paginate(10); 

        
        $totalSellers = Seller::count();
        $totalProducts = Product::count();

        
        return view('dashboard', compact('products', 'search', 'totalSellers', 'totalProducts'));
    }
}