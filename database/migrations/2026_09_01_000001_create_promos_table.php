<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('badge')->default('Promo');
            $table->enum('type', ['percent', 'fixed_amount', 'free_shipping'])->default('percent');
            $table->decimal('discount_value', 10, 2)->default(0); // 20 untuk 20%, atau 10000 untuk Rp 10.000
            $table->decimal('min_order_amount', 10, 2)->default(0);
            $table->decimal('max_discount_amount', 10, 2)->nullable(); // Maksimal potongan untuk persen
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('usage_limit')->nullable(); // Maksimal kuota pemakaian
            $table->integer('used_count')->default(0);
            $table->boolean('new_user_only')->default(false); // Khusus pesanan pertama
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
