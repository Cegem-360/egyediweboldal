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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('category')->default('limousine'); // limousine, suv, estate, coupe, cabriolet, van
            $table->string('type')->default('electric'); // electric, petrol, hybrid, amg
            $table->decimal('price', 12, 2);
            $table->string('currency', 3)->default('HUF');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->json('specifications')->nullable(); // engine, power, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
