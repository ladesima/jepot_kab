<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mcsp_documents', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dokumen');
            $table->string('tahun');
            $table->date('tanggal_upload');
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mcsp_documents');
    }
};