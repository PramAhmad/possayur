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
        Schema::table('product_sales_orders', function (Blueprint $table) {
            // variant batches
            $table->unsignedBigInteger('variant_id')->nullable()->after('product_id');
            $table->unsignedBigInteger('batch_id')->nullable()->after('variant_id');
            $table->foreign('variant_id')->references('id')->on('variants');
            $table->foreign('batch_id')->references('id')->on('batches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_sales_orders', function (Blueprint $table) {
            $table->dropForeign(['variant_id']);
            $table->dropForeign(['batch_id']);
            $table->dropColumn('variant_id');
            $table->dropColumn('batch_id');
        });
    }
};
