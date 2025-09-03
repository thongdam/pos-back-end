<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_number',
        'customer_id',
        'cashier_id',
        'subtotal',
        'discount_amount',
        'tax_amount',
        'total',
        'paid_amount',
        'change_amount',
        'payment_method',
        'payment_status',
        'reference_number',
        'notes',
        'completed_at'
    ];

    protected $casts = [
        'subtotal' => 'decimal:0',
        'discount_amount' => 'decimal:0',
        'tax_amount' => 'decimal:0',
        'total' => 'decimal:0',
        'paid_amount' => 'decimal:0',
        'change_amount' => 'decimal:0',
        'completed_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
