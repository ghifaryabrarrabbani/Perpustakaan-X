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
        Schema::table('table_sewa_buku', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_pustaka');
            $table->foreign('id_pustaka')->references('id')->on('pustaka');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sewa_buku');
    }
};
