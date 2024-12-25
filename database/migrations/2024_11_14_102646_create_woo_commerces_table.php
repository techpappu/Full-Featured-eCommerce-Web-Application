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
        Schema::create('woo_commerces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('woocommerce_order_id')->unique(); // WooCommerce order ID
            $table->string('wc_visual_order_id');
            $table->string('status');
            $table->string('currency');
            $table->decimal('total', 10, 2);
            $table->string('payment_method')->nullable(); // Stores the payment method
            $table->decimal('shipping_total', 10, 2)->nullable(); // Stores the shipping total
            $table->decimal('discount_total', 10, 2)->nullable(); // Stores the discount total
            $table->json('fee_lines')->nullable(); // Stores fees as JSON
            $table->json('customer_details')->nullable(); // Stores customer details as JSON
            $table->json('items')->nullable(); // Stores items as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woo_commerces');
    }
};
