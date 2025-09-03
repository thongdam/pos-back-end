<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_code',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'membership_type',
        'points',
        'total_spent',
        'total_orders',
        'last_visit',
        'notes',
        'is_active'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'total_spent' => 'decimal:0',
        'last_visit' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
