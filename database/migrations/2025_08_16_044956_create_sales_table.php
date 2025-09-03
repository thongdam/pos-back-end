<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_number')->unique();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('cashier_id');
            $table->decimal('subtotal', 18, 0);
            $table->decimal('discount_amount', 18, 0)->default(0);
            $table->decimal('tax_amount', 18, 0)->default(0);
            $table->decimal('total', 18, 0);
            $table->decimal('paid_amount', 18, 0)->default(0);
            $table->decimal('change_amount', 18, 0)->default(0);
            $table->enum('payment_method', ['ເງິນສົດ', 'ບັດເຄຣດິດ', 'ໂອນເງິນ', 'QR Code', 'ຄະແນນ']);
            $table->enum('payment_status', ['ລໍຖ້າ', 'ສຳເລັດ', 'ຍົກເລີກ', 'ຄືນເງິນ'])->default('ສຳເລັດ');
            $table->string('reference_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('cashier_id')->references('id')->on('users');
            $table->index(['payment_status', 'created_at']);
            $table->index(['cashier_id', 'created_at']);
            $table->index(['sale_number', 'reference_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
