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
        // crate table tax
        Schema::create('tax', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->string('name');
            $table->string('rate');
            $table->enum('is_active',[0,1])->comment('0 = tidak aktif 1 = aktif');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax');
    }
};
