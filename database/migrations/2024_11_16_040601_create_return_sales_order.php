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
        Schema::create('return_sales_order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sales_order_id');
            $table->string('return_number');
            $table->date('return_date');
            $table->text('note')->nullable();
            $table->decimal('total_qty', 20, 2);
            $table->decimal('total_discount', 20, 2)->nullable();
            $table->decimal('total_tax', 20, 2)->nullable();
            $table->decimal('grand_total', 20, 2);
            $table->string('document')->nullable();
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sales_order_id')->references('id')->on('sales_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_sales_order');
    }
};
