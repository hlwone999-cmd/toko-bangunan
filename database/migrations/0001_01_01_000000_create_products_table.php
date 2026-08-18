<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('brand')->nullable();
            $table->integer('price');
            $table->string('price_display');
            $table->string('unit', 50)->default('unit');
            $table->enum('stock_status', ['in_stock', 'low_stock', 'special_order'])->default('in_stock');
            $table->string('image_url')->nullable();
            $table->json('images')->nullable();
            $table->json('specifications')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
