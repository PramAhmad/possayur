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
        Schema::table('supplier', function (Blueprint $table) {
            // drop shop_name add supplyer_type
            $table->dropColumn('shop_name');
            $table->string('supplier_type')->after('company')->default('general');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier', function (Blueprint $table) {
            $table->string('shop_name')->after('company');
            $table->dropColumn('supplier_type');
        });
    }
};
