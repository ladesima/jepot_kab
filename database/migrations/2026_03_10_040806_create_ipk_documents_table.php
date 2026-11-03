<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ipk_documents', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dokumen');
            $table->year('tahun');
            $table->date('tanggal_upload');
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ipk_documents');
    }
};