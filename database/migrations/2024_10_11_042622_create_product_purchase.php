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
        Schema::create('product_purchase', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('varian_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->integer('quantity');
            $table->integer('receive')->nullable();
            $table->decimal('unit_price', 15, 2);
            $table->decimal('net_cost', 15, 2);
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->decimal('total_cost', 15, 2);
            $table->foreign('purchase_id')->references('id')->on('purchase')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('varian_id')->references('id')->on('varians')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchase');
    }
};
