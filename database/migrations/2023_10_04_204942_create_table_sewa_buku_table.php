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
        Schema::create('table_sewa_buku', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->date('tanggal_asli_kembali')->null;
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
