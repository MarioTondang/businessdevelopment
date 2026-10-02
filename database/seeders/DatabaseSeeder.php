<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::create([
            'name' => 'Business Development',
            'email' => 'BusinessDevelopment@gmail.com',
            'password' => Hash::make('BusinessDevelopment.'), 
        ]);
        
        // 2. Kategori (Makanan & Minuman Dipisah)
        $katMakanan = Category::create(['name' => 'Makanan', 'slug' => 'makanan']);
        $katMinuman = Category::create(['name' => 'Minuman', 'slug' => 'minuman']);
        $katFashion = Category::create(['name' => 'Fashion', 'slug' => 'fashion']);
        $katJasa = Category::create(['name' => 'Jasa', 'slug' => 'jasa']);

        // 3. Data Contoh Penjual (Seller) Mahasiswa
        $seller1 = Seller::create([
            'name' => 'Mario Tondang',
            'nim' => '2405102066',
            'jurusan' => 'Teknik Komputer dan Informatika',
            'major' => 'Manajemen Informatika',
            'kelas' => 'MI-5F',
            'whatsapp_number' => '082274909947',
        ]);

        $seller2 = Seller::create([
            'name' => 'Efraim Boangmanalu',
            'nim' => '2405102070',
            'jurusan' => 'Teknik Komputer dan Informatika',
            'major' => 'Teknik Komputer',
            'kelas' => 'TK-5A',
            'whatsapp_number' => '081234567890',
        ]);

        // 4. Data Contoh Produk
        Product::create([
            'seller_id' => $seller1->id,
            'category_id' => $katMakanan->id,
            'name' => 'Burger',
            'slug' => Str::slug('Burger-' . uniqid()),
            'price' => 15000,
            'description' => 'Burger daging sapi empuk dengan keju meleleh khas buatan mahasiswa.',
            'image' => null, // Tambahkan ini agar tidak error
        ]);

        Product::create([
            'seller_id' => $seller1->id,
            'category_id' => $katMinuman->id,
            'name' => 'Jus Buah Naga',
            'slug' => Str::slug('Jus Buah Naga-' . uniqid()),
            'price' => 15000,
            'description' => 'Jus buah naga segar kaya vitamin untuk menyegarkan harimu di kampus.',
            'image' => null, // Tambahkan ini
        ]);

        Product::create([
            'seller_id' => $seller2->id,
            'category_id' => $katMakanan->id,
            'name' => 'Risol Mayo',
            'slug' => Str::slug('Risol Mayo-' . uniqid()),
            'price' => 2000,
            'description' => 'Risol mayo lumer isi telur dan sosis yang sangat cocok untuk teman nugas.',
            'image' => null, // Tambahkan ini
        ]);
    }
}