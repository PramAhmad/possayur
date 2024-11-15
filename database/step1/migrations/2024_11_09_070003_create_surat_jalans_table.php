<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('sales_order_id');
            $table->string('packer')->nullable();
            $table->string('driver')->nullable();
            $table->date('due_date')->nullable();
            $table->string('signature_gudang');
            $table->string('signature_penerima');
            $table->string('signature_driver');
                    


            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_jalans');
    }
};
