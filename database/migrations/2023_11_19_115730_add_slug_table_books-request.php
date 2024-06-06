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
        Schema::table('requestbook', function (Blueprint $table) {
            $table->binary('cover')->nullable()->after('judul_buku');
            $table->bigInteger('slug')->nullable()->after('cover');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requestbook', function (Blueprint $table) {
            if (Schema::hasColumn('requestbook', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('requestbook', 'cover')) {
                $table->dropColumn('cover');
        }
    });
}
};
