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
        Schema::table('invoice_purchases', function (Blueprint $table) {
            // First drop any existing foreign key constraint on supplier_id if it exists
            if (Schema::hasColumn('invoice_purchases', 'supplier_id')) {
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $foreignKeys = array_map(function($key) {
                    return $key->getName();
                }, $sm->listTableForeignKeys('invoice_purchases'));
                
                if (in_array('invoice_purchases_supplier_id_foreign', $foreignKeys)) {
                    $table->dropForeign(['supplier_id']);
                }
            }
            
            // Make supplier_id nullable and add the foreign key with SET NULL on delete
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('supplier') // Make sure this is the correct table name
                  ->onUpdate('cascade')
                  ->onDelete('set null'); // This is the key change
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_purchases', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['supplier_id']);
            
            // If you want to make it non-nullable again in the down method
            $table->unsignedBigInteger('supplier_id')->nullable(false)->change();
            
            // Re-add the original foreign key constraint if needed
            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('supplier')
                  ->onUpdate('cascade');
        });
    }
};