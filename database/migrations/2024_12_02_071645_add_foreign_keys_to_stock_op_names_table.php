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
        Schema::table('stock_op_names', function (Blueprint $table) {
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_op_names', function (Blueprint $table) {
            $table->dropForeign('stock_op_names_outlet_id_foreign');
            $table->dropForeign('stock_op_names_product_id_foreign');
        });
    }
};
