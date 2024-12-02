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
        Schema::create('product_return_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('return_purchase_id')->index('product_return_purchases_return_purchase_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_return_purchases_product_id_foreign');
            $table->decimal('qty', 20);
            $table->decimal('price', 20);
            $table->decimal('discount', 20)->nullable();
            $table->decimal('tax', 20)->nullable();
            $table->decimal('total', 20);
            $table->unsignedBigInteger('variant_id')->nullable()->index('product_return_purchases_variant_id_foreign');
            $table->unsignedBigInteger('batch_id')->nullable()->index('product_return_purchases_batch_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_return_purchases');
    }
};
