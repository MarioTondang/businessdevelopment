<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    
    protected $fillable = ['nim', 'name', 'jurusan', 'major', 'kelas', 'whatsapp_number'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
