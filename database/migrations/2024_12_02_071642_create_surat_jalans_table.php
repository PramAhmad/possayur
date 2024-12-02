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
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('sales_order_id')->index('surat_jalans_sales_order_id_foreign');
            $table->string('packer')->nullable();
            $table->string('driver')->nullable();
            $table->date('due_date')->nullable();
            $table->string('signature_gudang')->nullable();
            $table->string('signature_penerima')->nullable();
            $table->string('signature_driver')->nullable();
            $table->integer('total_qty')->nullable();
            $table->decimal('grand_total', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
