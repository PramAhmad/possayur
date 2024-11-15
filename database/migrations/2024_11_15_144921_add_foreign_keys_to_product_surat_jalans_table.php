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
        Schema::table('product_surat_jalans', function (Blueprint $table) {
            $table->foreign(['product_id'])->references(['id'])->on('product')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['surat_jalan_id'])->references(['id'])->on('surat_jalans')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_surat_jalans', function (Blueprint $table) {
            $table->dropForeign('product_surat_jalans_product_id_foreign');
            $table->dropForeign('product_surat_jalans_surat_jalan_id_foreign');
        });
    }
};
