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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('reference_number')->unique();
            $table->unsignedBigInteger('sales_order_id')->index('invoices_sales_order_id_foreign');
            $table->unsignedBigInteger('outlet_id')->index('invoices_outlet_id_foreign');
            $table->unsignedBigInteger('surat_jalan_id')->index('invoices_surat_jalan_id_foreign');
            $table->integer('total_qty');
            $table->decimal('grandtotal', 15);
            $table->decimal('discount', 15)->nullable();
            $table->text('note')->nullable();
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
