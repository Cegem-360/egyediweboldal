<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'car_id',
        'quantity',
        'car_name',
        'car_model',
        'unit_price',
        'total_price',
        'options',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
        'options' => 'array',
    ];

    // Relations
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    // Accessors
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->unit_price, 0, ',', '.') . ' HUF';
    }

    public function getFormattedTotalAttribute(): string
    {
        return number_format($this->total_price, 0, ',', '.') . ' HUF';
    }
}
