<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['seller_id', 'category_id', 'name', 'slug', 'description', 'price', 'image', 'is_featured'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
}
}
