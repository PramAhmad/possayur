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
        Schema::create('product_sales_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('sales_order_id')->index('product_sales_orders_sales_order_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_sales_orders_product_id_foreign');
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('total_price');
            $table->integer('discount')->default(0);
            $table->integer('tax')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sales_orders');
    }
};
