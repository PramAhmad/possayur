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
        Schema::create('curencys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->timestamps();
            $table->string('name');
            $table->string('symbol');
            $table->string('code');
            $table->boolean('is_active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curencys');
    }
};
