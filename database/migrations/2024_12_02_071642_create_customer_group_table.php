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
        Schema::create('customer_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id')->nullable()->index('customer_group_outlet_id_foreign');
            $table->string('name');
            $table->integer('percentage');
            $table->enum('is_active', ['0', '1'])->comment('0 = tidak aktif 1 = aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_group');
    }
};
