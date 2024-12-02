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
        Schema::create('stock_op_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index('stock_op_names_product_id_foreign');
            $table->unsignedBigInteger('outlet_id')->index('stock_op_names_outlet_id_foreign');
            $table->integer('initial_qty');
            $table->integer('actual_qty');
            $table->integer('difference');
            $table->date('opname_date');
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_op_names');
    }
};
