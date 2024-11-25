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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reference_number')->unique();
            $table->unsignedBigInteger('sales_order_id');
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('surat_jalan_id');
            $table->integer('total_qty');
            $table->decimal('grandtotal', 15, 2);
            $table->decimal('discount', 15, 2)->nullable();
            $table->text('note')->nullable();
            $table->foreign('sales_order_id')->references('id')->on('sales_orders');
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('surat_jalan_id')->references('id')->on('surat_jalans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
