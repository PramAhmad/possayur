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
        Schema::table('purchase', function (Blueprint $table) {
            $table->foreign(['outlet_id'])->references(['id'])->on('outlets')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['supplier_id'])->references(['id'])->on('supplier')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase', function (Blueprint $table) {
            $table->dropForeign('purchase_outlet_id_foreign');
            $table->dropForeign('purchase_supplier_id_foreign');
            $table->dropForeign('purchase_user_id_foreign');
        });
    }
};
