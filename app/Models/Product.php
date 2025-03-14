<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Aisle;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'threshold_quantity',
        'aisle_id',
        'category_id',
        'is_popular',
        'is_promotion',
        'promotion_price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'promotion_price' => 'decimal:2',
        'is_popular' => 'boolean',
        'is_promotion' => 'boolean',
    ];

    public function aisle()
    {
        return $this->belongsTo(Aisle::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPopularProducts()
    {
        return $this->products()->where('is_popular', true)->get();
    }

    public function getPromotionProducts()
    {
        return $this->products()->where('is_promotion', true)->get();
    }
}
