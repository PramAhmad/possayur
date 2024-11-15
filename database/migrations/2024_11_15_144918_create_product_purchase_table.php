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
        Schema::create('product_purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('purchase_id')->index('product_purchase_purchase_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_purchase_product_id_foreign');
            $table->unsignedBigInteger('varian_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->integer('quantity');
            $table->integer('receive')->nullable();
            $table->decimal('unit_price', 15);
            $table->decimal('net_cost', 15);
            $table->decimal('discount', 15)->nullable();
            $table->decimal('tax', 15)->nullable();
            $table->decimal('tax_rate', 5)->nullable();
            $table->decimal('total_cost', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_purchase');
    }
};
