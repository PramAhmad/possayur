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
        Schema::create('coupon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id')->nullable()->index('coupon_outlet_id_foreign');
            $table->string('code');
            $table->enum('type', ['fixed', 'percentage']);
            $table->integer('amount');
            $table->integer('min_amount');
            $table->integer('qty');
            $table->integer('used');
            $table->date('exp_date');
            $table->unsignedBigInteger('user_id')->index('coupon_user_id_foreign');
            $table->enum('is_active', ['0', '1'])->comment('0 = tidak aktif 1 = aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon');
    }
};
