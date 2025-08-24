<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'customer_name',
        'customer_email',
        'customer_phone',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_postal_code',
        'billing_country',
        'shipping_name',
        'shipping_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'subtotal',
        'tax_amount',
        'shipping_amount',
        'total',
        'currency',
        'payment_method',
        'payment_status',
        'paid_at',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessors
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Függőben',
            'confirmed' => 'Megerősítve',
            'processing' => 'Feldolgozás alatt',
            'shipped' => 'Szállítás alatt',
            'delivered' => 'Kiszállítva',
            'cancelled' => 'Törölve',
            default => 'Ismeretlen',
        };
    }

    public function getPaymentStatusLabelAttribute(): string
    {
        return match($this->payment_status) {
            'pending' => 'Függőben',
            'paid' => 'Fizetve',
            'failed' => 'Sikertelen',
            default => 'Ismeretlen',
        };
    }

    // Methods
    public static function generateOrderNumber(): string
    {
        return 'MB-' . date('Y') . '-' . str_pad(random_int(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    // Scopes
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }
}
