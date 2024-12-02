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
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['sales_order_id'])->references(['id'])->on('sales_orders')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['surat_jalan_id'])->references(['id'])->on('surat_jalans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_outlet_id_foreign');
            $table->dropForeign('invoices_sales_order_id_foreign');
            $table->dropForeign('invoices_surat_jalan_id_foreign');
        });
    }
};
