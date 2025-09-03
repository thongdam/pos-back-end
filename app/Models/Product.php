<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'cost',
        'category_id',
        'stock',
        'min_stock',
        'max_stock',
        'unit',
        'images',
        'supplier_id',
        'weight',
        'dimensions',
        'notes',
        'track_stock',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:0',
        'cost' => 'decimal:0',
        'weight' => 'decimal:2',
        'images' => 'array',
        'track_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock', '<=', 'min_stock');
    }
}
