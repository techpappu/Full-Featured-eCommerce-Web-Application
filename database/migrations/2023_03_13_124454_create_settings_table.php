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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable()->default('This Site title');
            $table->string('logo', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('keywords', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('postcode', 8)->nullable();
            $table->string('status', 10)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('twitter', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->string('currency_prefix', 10)->nullable()->default('$');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
