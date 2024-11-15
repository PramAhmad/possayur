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
        Schema::create('product_price_by_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('product_id')->index('product_price_by_customers_product_id_foreign');
            $table->unsignedBigInteger('customer_id')->index('product_price_by_customers_customer_id_foreign');
            $table->unsignedBigInteger('outlet_id')->index('product_price_by_customers_outlet_id_foreign');
            $table->decimal('price', 15);
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('unit_id')->nullable()->index('product_price_by_customers_unit_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_price_by_customers');
    }
};
