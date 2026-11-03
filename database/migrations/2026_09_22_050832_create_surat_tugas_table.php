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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_st')->unique();
            $table->string('nomor_spd')->nullable();
            $table->text('dasar_surat');
            $table->date('tanggal_surat');
            $table->text('maksud_tugas');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('hari_tanggal_teks')->nullable();
            $table->string('tempat_tujuan');
            $table->foreignId('pegawai_id')->nullable()->constrained('pegawais')->nullOnDelete();
            $table->string('nama_pegawai');
            $table->string('nip_pegawai')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('jabatan_pegawai')->nullable();
            $table->string('pejabat_id')->nullable();
            $table->string('pejabat_nama')->nullable();
            $table->string('pejabat_jabatan')->nullable();
            $table->string('pejabat_pangkat')->nullable();
            $table->string('pejabat_nip')->nullable();
            $table->boolean('terbitkan_spd')->default(true);
            $table->string('alat_angkut')->nullable();
            $table->integer('durasi_hari')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
