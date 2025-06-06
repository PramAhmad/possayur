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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id')->nullable()->index('product_outlet_id_foreign');
            $table->string('name');
            $table->string('barcode');
            $table->string('slug');
            $table->integer('cost_price');
            $table->integer('selling_price');
            $table->integer('qty');
            $table->integer('alert_qty');
            $table->string('sku');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->enum('is_variant', ['0', '1'])->default('0')->comment('0 = tidak varian 1 = varian');
            $table->enum('is_batch', ['0', '1'])->default('0')->comment('0 = tidak batch 1 = batch');
            $table->enum('is_difprice', ['0', '1'])->default('0')->comment('0 = tidak difprice 1 = difprice');
            $table->enum('is_active', ['0', '1'])->default('0')->comment('0 = tidak aktif 1 = aktif');
            $table->unsignedBigInteger('category_id')->index('product_category_id_foreign');
            $table->unsignedBigInteger('brand_id')->nullable()->index('product_brand_id_foreign');
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('product_unit_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
