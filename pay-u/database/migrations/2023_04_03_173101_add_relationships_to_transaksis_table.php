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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('customerId')->unsigned()->change();
            $table->foreign('customerId')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->bigInteger('userId')->unsigned()->change();
            $table->foreign('userId')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_customerId_foreign');
            $table->dropIndex('transaksis_customerId_foreign');
            $table->integer('customerId')->unsigned()->change();
            
            $table->dropForeign('transaksis_userId_foreign');
            $table->dropIndex('transaksis_userId_foreign');
            $table->bigInteger('userId')->unsigned()->change();
        });
    }
};
