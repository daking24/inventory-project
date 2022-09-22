<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ReceivedProduct;
use App\Models\SoldProduct;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_category_id',
        'base_price',
        'selling_price',
        'stock',
        'stock_defective'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function solds()
    {
        return $this->hasMany(SoldProduct::class);
    }

    public function receiveds()
    {
        return $this->hasMany(ReceivedProduct::class);
    }
}
