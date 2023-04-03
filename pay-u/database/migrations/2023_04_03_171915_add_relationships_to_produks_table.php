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
        Schema::table('produks', function (Blueprint $table) {
            $table->integer('kategoriId')->unsigned()->change(); // FK
            $table->foreign('kategoriId')->references('id')->on('kategoris')
                    ->onUpdate('cascade')->onDelete('cascade');
                    // update and delete berdasarkan tabel kategori
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function(Blueprint $table) {
            $table->dropForeign('produks_kategoriId_foreign');
            $table->dropIndex('produks_kategoriId_foreign');
            $table->unsignedBigInteger('kategoriId')->change();
        });
    }
};
