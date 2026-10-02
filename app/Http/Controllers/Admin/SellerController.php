<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::orderBy('name', 'asc')->paginate(10);
        return view('admin.sellers.index', compact('sellers'));
    }

    public function create()
    {
        return view('admin.sellers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:255',
            'major' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
        ]);

        // Menyimpan data secara eksplisit agar aman dari mass-assignment
        Seller::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'major' => $request->major,
            'kelas' => $request->kelas,
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        return redirect()->route('admin.sellers.index')->with('success', 'Data mahasiswa/penjual berhasil ditambahkan.');
    }

    public function edit(Seller $seller)
    {
        return view('admin.sellers.edit', compact('seller'));
    }

    public function update(Request $request, Seller $seller)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:255',
            'major' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
        ]);

        $seller->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'major' => $request->major,
            'kelas' => $request->kelas,
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        return redirect()->route('admin.sellers.index')->with('success', 'Data mahasiswa/penjual berhasil diperbarui.');
    }

    public function destroy(Seller $seller)
    {
        // Hapus semua produk milik penjual ini terlebih dahulu
        $seller->products()->delete(); 
        
        // Baru hapus data penjualnya
        $seller->delete();
        
        return redirect()->route('admin.sellers.index')->with('success', 'Data mahasiswa/penjual beserta produknya berhasil dihapus.');
    }
}