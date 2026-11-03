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
        Schema::table('kepala_daerah', function (Blueprint $table) {
            $table->string('file_lhkpn')->nullable()->after('foto');
        });

        Schema::table('sekretaris_daerahs', function (Blueprint $table) {
            $table->string('file_lhkpn')->nullable()->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kepala_daerah', function (Blueprint $table) {
            $table->dropColumn('file_lhkpn');
        });

        Schema::table('sekretaris_daerahs', function (Blueprint $table) {
            $table->dropColumn('file_lhkpn');
        });
    }
};
