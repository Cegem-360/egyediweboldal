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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->json('options')->nullable(); // konfiguráció opciók (szín, extrák, stb.)
            $table->decimal('price', 12, 2); // aktuális ár a kosárba helyezéskor
            $table->timestamps();

            $table->index(['user_id', 'session_id']);
            $table->unique(['user_id', 'car_id', 'session_id'], 'unique_cart_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
