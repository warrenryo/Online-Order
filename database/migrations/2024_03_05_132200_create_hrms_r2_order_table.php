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
        Schema::create('hrms_r2_order', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->date('date');
            $table->string('customer');
            $table->integer('price');
            $table->integer('quantity');
            $table->decimal('total_amount')->default(0);
            $table->decimal('total_received')->default(0);
            $table->decimal('change')->default(0);
            $table->string('payment_status')->default('paid');
            $table->string('payment_method')->default('cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_r2_order');
    }
};
