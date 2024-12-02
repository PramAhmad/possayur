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
        Schema::table('product_purchase', function (Blueprint $table) {
            $table->foreign(['batch_id'])->references(['id'])->on('batches')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['purchase_id'])->references(['id'])->on('purchase')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['variant_id'])->references(['id'])->on('variants')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_purchase', function (Blueprint $table) {
            $table->dropForeign('product_purchase_batch_id_foreign');
            $table->dropForeign('product_purchase_product_id_foreign');
            $table->dropForeign('product_purchase_purchase_id_foreign');
            $table->dropForeign('product_purchase_variant_id_foreign');
        });
    }
};
