<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppids', function (Blueprint $table) {
            $table->id();
            $table->string('badan_publik');
            $table->text('alamat');
            $table->text('ruang_lingkup');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppids');
    }
};
