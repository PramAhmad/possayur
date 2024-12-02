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
        Schema::table('invoice_purchases', function (Blueprint $table) {
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['purchase_id'])->references(['id'])->on('purchase')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['supplier_id'])->references(['id'])->on('supplier')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_purchases', function (Blueprint $table) {
            $table->dropForeign('invoice_purchases_outlet_id_foreign');
            $table->dropForeign('invoice_purchases_purchase_id_foreign');
            $table->dropForeign('invoice_purchases_supplier_id_foreign');
            $table->dropForeign('invoice_purchases_user_id_foreign');
        });
    }
};
