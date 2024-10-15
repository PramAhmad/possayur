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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reference_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('outlet_id');
            $table->integer('total_qty');
            $table->decimal('total_discount', 15, 2);
            $table->decimal('total_tax', 15, 2);
            $table->decimal('total_cost', 15, 2);
            $table->decimal('order_tax_rate', 5, 2);
            $table->decimal('order_tax', 15, 2);
            $table->decimal('order_discount', 15, 2);
            $table->decimal('shipping_cost', 15, 2);
            $table->decimal('grand_total', 15, 2);
            $table->decimal('paid_amount', 15, 2);
            $table->string('status');
            $table->string('payment_status');
            $table->string('document')->nullable();
            $table->text('note')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
};

