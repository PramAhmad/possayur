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
        Schema::create('return_purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('puchase_id');
            $table->string('return_number');
            $table->date('return_date');
            $table->text('note')->nullable();
            $table->decimal('total_qty', 20, 2);
            $table->decimal('total_discount', 20, 2)->nullable();
            $table->decimal('total_tax', 20, 2)->nullable();
            $table->decimal('grand_total', 20, 2);
            $table->string('document')->nullable();
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_purchases');
    }
};
