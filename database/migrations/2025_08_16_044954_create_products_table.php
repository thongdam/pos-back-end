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
            $table->text('description')->nullable();
            $table->string('sku')->unique();
            $table->string('barcode')->nullable()->unique();
            $table->decimal('price', 15, 0); // ກີບ (LAK) no decimals
            $table->decimal('cost', 15, 0)->default(0);
            $table->unsignedBigInteger('category_id');
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->integer('max_stock')->default(1000);
            $table->string('unit', 20);
            $table->json('images')->nullable(); // Multiple images
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('track_stock')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->index(['category_id', 'is_active']);
            $table->index(['stock', 'min_stock']);
            $table->index(['sku', 'barcode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


#php artisan migrate:rollback
