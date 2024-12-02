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
        Schema::create('product_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('invoice_id')->index('product_invoices_invoice_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_invoices_product_id_foreign');
            $table->integer('qty');
            $table->decimal('price', 15);
            $table->decimal('discount', 15)->nullable();
            $table->decimal('total', 15);
            $table->unsignedBigInteger('variant_id')->nullable()->index('product_invoices_variant_id_foreign');
            $table->unsignedBigInteger('batch_id')->nullable()->index('product_invoices_batch_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_invoices');
    }
};
