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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('category');
    }
};
