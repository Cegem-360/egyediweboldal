<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle', 
        'hero_description',
        'hero_image',
        'timeline_items',
        'gallery_items',
        'statistics',
        'cta_title',
        'cta_description',
        'cta_button_text',
        'cta_button_link',
        'is_active'
    ];

    protected $casts = [
        'timeline_items' => 'array',
        'gallery_items' => 'array',
        'statistics' => 'array',
        'is_active' => 'boolean'
    ];

    public static function getActiveContent()
    {
        return self::where('is_active', true)->first();
    }
}
