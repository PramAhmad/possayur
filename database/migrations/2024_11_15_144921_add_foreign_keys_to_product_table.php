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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign(['brand_id'])->references(['id'])->on('brand')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['category_id'])->references(['id'])->on('category')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('units')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_brand_id_foreign');
            $table->dropForeign('product_category_id_foreign');
            $table->dropForeign('product_outlet_id_foreign');
            $table->dropForeign('product_unit_id_foreign');
        });
    }
};
