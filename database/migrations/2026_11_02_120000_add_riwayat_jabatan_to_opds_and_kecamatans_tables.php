<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('opds') && !Schema::hasColumn('opds', 'riwayat_jabatan')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->text('riwayat_jabatan')->nullable()->after('kepala_dinas');
            });
        }

        if (Schema::hasTable('kecamatans') && !Schema::hasColumn('kecamatans', 'riwayat_jabatan')) {
            Schema::table('kecamatans', function (Blueprint $table) {
                $table->text('riwayat_jabatan')->nullable()->after('kepala_camat');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('opds') && Schema::hasColumn('opds', 'riwayat_jabatan')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->dropColumn('riwayat_jabatan');
            });
        }

        if (Schema::hasTable('kecamatans') && Schema::hasColumn('kecamatans', 'riwayat_jabatan')) {
            Schema::table('kecamatans', function (Blueprint $table) {
                $table->dropColumn('riwayat_jabatan');
            });
        }
    }
};
