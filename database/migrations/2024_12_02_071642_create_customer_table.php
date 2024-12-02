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
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_group_id')->index('customer_customer_group_id_foreign');
            $table->unsignedBigInteger('user_id')->index('customer_user_id_foreign');
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
            $table->enum('is_active', ['0', '1'])->comment('0 = tidak aktif 1 = aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
