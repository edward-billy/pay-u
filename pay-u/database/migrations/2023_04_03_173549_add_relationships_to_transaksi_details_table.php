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
        Schema::table('transaksiDetails', function (Blueprint $table) {
            $table->integer('transaksiId')->unsigned()->change();
            $table->foreign('transaksiId')->references('id')->on('transaksis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->integer('produkId')->unsigned()->change();
            $table->foreign('produkId')->references('id')->on('produks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksiDetails', function(Blueprint $table) {
            $table->dropForeign('transaksiDetails_transaksiId_foreign');
            $table->dropIndex('transaksiDetails_transaksiId_foreign');
            $table->integer('transaksiId')->change();
            
            $table->dropForeign('transaksiDetails_productId_foreign');
            $table->dropIndex('transaksiDetails_productId_foreign');
            $table->integer('produkId')->change();
        });
    }
    
};
