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
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('reference_no');
            $table->unsignedBigInteger('user_id')->index('purchase_user_id_foreign');
            $table->unsignedBigInteger('supplier_id')->index('purchase_supplier_id_foreign');
            $table->unsignedBigInteger('outlet_id')->index('purchase_outlet_id_foreign');
            $table->integer('total_qty');
            $table->decimal('total_discount', 15)->nullable();
            $table->decimal('total_tax', 15)->nullable();
            $table->decimal('total_cost', 15);
            $table->decimal('order_tax_rate', 5)->nullable();
            $table->decimal('order_tax', 15)->nullable();
            $table->decimal('order_discount', 15)->nullable();
            $table->decimal('shipping_cost', 15)->nullable();
            $table->decimal('grand_total', 15);
            $table->decimal('paid_amount', 15)->nullable();
            $table->string('status');
            $table->string('payment_status');
            $table->string('document')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
