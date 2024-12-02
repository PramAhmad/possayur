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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('outlet_id')->index('return_sales_order_outlet_id_foreign');
            $table->unsignedBigInteger('user_id')->index('return_sales_order_user_id_foreign');
            $table->unsignedBigInteger('sales_order_id')->index('return_sales_order_sales_order_id_foreign');
            $table->string('return_number');
            $table->date('return_date');
            $table->text('note')->nullable();
            $table->decimal('total_qty', 20);
            $table->decimal('total_discount', 20)->nullable();
            $table->decimal('total_tax', 20)->nullable();
            $table->decimal('grand_total', 20);
            $table->string('document')->nullable();
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
