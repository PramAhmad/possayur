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
        Schema::table('surat_jalans', function (Blueprint $table) {
            // totalqty ,grandtotal
            $table->integer('total_qty')->nullable();
            $table->decimal('grand_total', 20, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_jalasn', function (Blueprint $table) {
            $table->dropColumn(['total_qty', 'grand_total']);
            
        });
    }
};
