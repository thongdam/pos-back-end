<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['ຊາຍ', 'ຍິງ', 'ອື່ນໆ'])->nullable();
            $table->enum('membership_type', ['ທົ່ວໄປ', 'ເງິນ', 'ທອງ', 'ເພັດ'])->default('ທົ່ວໄປ');
            $table->integer('points')->default(0);
            $table->decimal('total_spent', 18, 0)->default(0);
            $table->integer('total_orders')->default(0);
            $table->timestamp('last_visit')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['membership_type', 'is_active']);
            $table->index(['points', 'total_spent']);
            $table->index(['customer_code', 'phone']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
