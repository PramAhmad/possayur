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
        Schema::create('product_return_sales_order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('return_sales_order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->decimal('qty', 20, 2);
            $table->decimal('price', 20, 2);
            $table->decimal('discount', 20, 2)->nullable();
            $table->decimal('tax', 20, 2)->nullable();
            $table->decimal('total', 20, 2);
            $table->foreign('return_sales_order_id')->references('id')->on('return_sales_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_return_sales_order');
    }
};
