adjust_nullable_supplier.php
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
            // First change all columns except outlet_id to nullable
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('bank_branch')->nullable()->change();
            $table->string('account_holder')->nullable()->change();
            $table->string('supplier_type')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            
            // Ensure outlet_id remains required
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier', function (Blueprint $table) {
            // Revert changes if needed
            $table->string('name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->text('address')->nullable(false)->change();
            $table->string('company')->nullable(false)->change();
            $table->string('bank_name')->nullable(false)->change();
            $table->string('bank_branch')->nullable(false)->change();
            $table->string('account_holder')->nullable(false)->change();
            $table->string('supplier_type')->nullable(false)->change();
            $table->string('account_number')->nullable(false)->change();
        });
    }
};