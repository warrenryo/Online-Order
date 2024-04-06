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
        Schema::create('hrms_r2_pos_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_invoice');
            $table->string('customer_name');
            $table->integer('discount')->nullable();
            $table->integer('sales_tax')->nullable();
            $table->integer('total_price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_r2_pos_orders');
    }
};
