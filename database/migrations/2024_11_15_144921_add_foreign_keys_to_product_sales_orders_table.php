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
        Schema::table('product_sales_orders', function (Blueprint $table) {
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['sales_order_id'])->references(['id'])->on('sales_orders')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_sales_orders', function (Blueprint $table) {
            $table->dropForeign('product_sales_orders_product_id_foreign');
            $table->dropForeign('product_sales_orders_sales_order_id_foreign');
        });
    }
};
