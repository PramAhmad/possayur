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
        Schema::create('product_surat_jalans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('surat_jalan_id')->index('product_surat_jalans_surat_jalan_id_foreign');
            $table->unsignedBigInteger('product_id')->index('product_surat_jalans_product_id_foreign');
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('total_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_surat_jalans');
    }
};
