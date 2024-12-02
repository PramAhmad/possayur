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
        Schema::create('product_invoice_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('invoice_purchase_id')->index('product_invoice_purchases_invoice_purchase_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_invoice_purchases_product_id_foreign');
            $table->unsignedBigInteger('variant_id')->nullable()->index('product_invoice_purchases_variant_id_foreign');
            $table->unsignedBigInteger('batch_id')->nullable()->index('product_invoice_purchases_batch_id_foreign');
            $table->integer('qty');
            $table->decimal('price', 15);
            $table->decimal('discount', 15)->nullable();
            $table->decimal('total_price', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_invoice_purchases');
    }
};
