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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->string('reference_no');
            $table->integer('total_qty')->default(0);
            $table->integer('total_discount')->default(0);
            $table->integer('total_tax')->default(0);
            $table->integer('grandtotal')->default(0);
            $table->integer('order_tax_rate')->default(0);
            $table->integer('order_tax')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->string('document')->nullable();
            $table->integer('paid_amount')->default(0);
            $table->text('note')->nullable();








            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_orders');
    }
};
