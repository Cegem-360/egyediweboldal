<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Car extends Model
{
    protected $fillable = [
        'name',
        'model',
        'category',
        'type',
        'price',
        'currency',
        'description',
        'image',
        'featured',
        'active',
        'specifications',
    ];

    protected $casts = [
        'specifications' => 'array',
        'featured' => 'boolean',
        'active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format($this->price, 0, ',', '.') . ' ' . $this->currency
        );
    }

    protected function isElectric(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->type === 'electric'
        );
    }

    protected function isAmg(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->type === 'amg'
        );
    }

    // Constants
    const CATEGORIES = [
        'limousine' => 'Limuzin',
        'suv' => 'SUV',
        'estate' => 'T-Modell',
        'coupe' => 'Coupé',
        'cabriolet' => 'Cabriolet',
        'van' => 'Van',
    ];

    const TYPES = [
        'electric' => 'Elektromos',
        'petrol' => 'Benzin',
        'hybrid' => 'Hibrid',
        'amg' => 'AMG',
    ];
}
