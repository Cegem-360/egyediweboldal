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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('status')->default('pending'); // pending, confirmed, processing, shipped, delivered, cancelled
            
            // Vásárló adatok
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            
            // Számlázási cím
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_phone')->nullable();
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_postal_code');
            $table->string('billing_country')->default('Hungary');
            
            // Szállítási cím
            $table->string('shipping_name')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postal_code')->nullable();
            $table->string('shipping_country')->nullable();
            
            // Pénzügyi adatok
            $table->decimal('subtotal', 12, 2);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('shipping_amount', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->string('currency', 3)->default('HUF');
            
            // Fizetés
            $table->string('payment_method')->nullable(); // card, transfer, cash
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->timestamp('paid_at')->nullable();
            
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('order_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
