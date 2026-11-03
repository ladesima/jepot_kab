<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('desas', function (Blueprint $table) {
            $table->text('alamat')->nullable()->after('kepala_desa');
            $table->string('email')->nullable()->after('alamat');
            $table->string('telepon')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('desas', function (Blueprint $table) {
            $table->dropColumn(['alamat','email','telepon']);
        });
    }
};