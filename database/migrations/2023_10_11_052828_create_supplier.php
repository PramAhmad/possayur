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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('company');
            $table->string('shop_name');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_holder');
            $table->string('account_number');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};
