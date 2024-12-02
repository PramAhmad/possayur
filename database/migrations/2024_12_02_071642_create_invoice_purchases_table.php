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
        Schema::create('invoice_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('invoice_number');
            $table->unsignedBigInteger('outlet_id')->index('invoice_purchases_outlet_id_foreign');
            $table->unsignedBigInteger('purchase_id')->index('invoice_purchases_purchase_id_foreign');
            $table->unsignedBigInteger('supplier_id')->index('invoice_purchases_supplier_id_foreign');
            $table->unsignedBigInteger('user_id')->index('invoice_purchases_user_id_foreign');
            $table->integer('total_qty');
            $table->decimal('total_cost', 15);
            $table->decimal('total_discount', 15)->nullable();
            $table->decimal('grand_total', 15);
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_purchases');
    }
};
