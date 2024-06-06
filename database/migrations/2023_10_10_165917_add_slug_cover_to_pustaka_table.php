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
        Schema::table('pustaka', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('judul_buku');
            $table->binary('cover')->nullable()->after('judul_buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pustaka', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('books', 'cover')) {
                $table->dropColumn('cover');
        }
    });
}
};
