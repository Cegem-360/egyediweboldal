<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->string('hero_subtitle');
            $table->text('hero_description');
            $table->string('hero_image')->nullable();
            
            // Timeline items (JSON)
            $table->json('timeline_items');
            
            // Gallery items (JSON)
            $table->json('gallery_items');
            
            // Statistics (JSON)
            $table->json('statistics');
            
            // CTA Section
            $table->string('cta_title');
            $table->text('cta_description');
            $table->string('cta_button_text');
            $table->string('cta_button_link');
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
