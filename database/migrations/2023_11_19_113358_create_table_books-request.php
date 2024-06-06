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
        Schema::create('requestbook', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('username');
            $table->string('judul_buku', 100);
            $table->string('penulis', 100);
            $table->string('kategori', 100);
            $table->string('penerbit', 100)->nullable;
            $table->year('tahun_buku');
            $table->string('edisi_buku', 100)->nullable;
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
