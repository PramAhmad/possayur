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
        Schema::table('log_products', function (Blueprint $table) {
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('log_products', function (Blueprint $table) {
            $table->dropForeign('log_products_product_id_foreign');
        });
    }
};
