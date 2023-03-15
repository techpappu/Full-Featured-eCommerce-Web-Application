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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('shipping_id');
            $table->integer('discount_id')->nullable();
            $table->date('invoice_date');
            $table->double('gross_total', 15, 2);
            $table->double('shipping_total', 15, 2);
            $table->double('discount_total', 15, 2)->nullable();
            $table->double('tax_total', 15, 2);
            $table->double('grand_total', 15, 2);
            $table->string('status', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
