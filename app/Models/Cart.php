<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'car_id',
        'quantity',
        'options',
        'price',
    ];

    protected $casts = [
        'options' => 'array',
        'price' => 'decimal:2',
    ];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    // Accessors
    public function getTotalPriceAttribute(): float
    {
        return $this->price * $this->quantity;
    }

    // Scopes
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForSession($query, $sessionId)
    {
        return $query->where('session_id', $sessionId)->whereNull('user_id');
    }

    public function scopeForGuest($query, $sessionId)
    {
        return $query->where('session_id', $sessionId)->whereNull('user_id');
    }
}
