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
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('paid_amount', 20,3)->after('total_qty');
            $table->unsignedBigInteger('coupon_id')->nullable()->after('paid_amount');
            $table->enum('coupon_type', ['fixed', 'percentage'])->nullable()->after('coupon_id');
            $table->decimal('coupon_amount', 20, 3)->nullable()->after('coupon_type');;
            $table->decimal('total_discount', 20,3)->after('paid_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
