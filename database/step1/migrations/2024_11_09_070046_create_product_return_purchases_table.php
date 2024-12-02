<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_return_purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('return_purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('qty', 20, 2);
            $table->decimal('price', 20, 2);
            $table->decimal('discount', 20, 2)->nullable();
            $table->decimal('tax', 20, 2)->nullable();
            $table->decimal('total', 20, 2);
            $table->foreign('return_purchase_id')->references('id')->on('return_purchases');
            $table->foreign('product_id')->references('id')->on('products');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_return_purchases');
    }
};
