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
        Schema::table('product_price_by_customers', function (Blueprint $table) {
            $table->foreign(['customer_id'])->references(['id'])->on('customer')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['unit_id'])->references(['id'])->on('units')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_price_by_customers', function (Blueprint $table) {
            $table->dropForeign('product_price_by_customers_customer_id_foreign');
            $table->dropForeign('product_price_by_customers_outlet_id_foreign');
            $table->dropForeign('product_price_by_customers_product_id_foreign');
            $table->dropForeign('product_price_by_customers_unit_id_foreign');
        });
    }
};
