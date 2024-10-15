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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_group_id');
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('tax')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');
            $table->enum('is_active',[0,1])->comment('0 = tidak aktif 1 = aktif');
            $table->foreign('customer_group_id')->references('id')->on('customer_group')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('customer');
    }
};
