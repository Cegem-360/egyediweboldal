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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->string('car_name'); // snapshot of car name at time of order
            $table->string('car_model'); // snapshot of car model at time of order
            $table->decimal('unit_price', 12, 2);
            $table->decimal('total_price', 12, 2);
            $table->json('options')->nullable(); // konfiguráció opciók snapshot
            $table->timestamps();

            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
