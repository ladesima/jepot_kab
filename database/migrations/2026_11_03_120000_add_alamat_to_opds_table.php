<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('opds') && !Schema::hasColumn('opds', 'alamat')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->text('alamat')->nullable()->after('riwayat_jabatan');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('opds') && Schema::hasColumn('opds', 'alamat')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->dropColumn('alamat');
            });
        }
    }
};
