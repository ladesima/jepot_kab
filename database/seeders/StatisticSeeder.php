<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel sebelum mengisi
        Schema::disableForeignKeyConstraints();
        DB::table('statistics')->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            // Kartu Ringkasan
            ['key' => 'wifi_points', 'group' => 'summary', 'title' => 'Titik Wi-Fi Publik', 'value' => '125', 'unit' => 'Titik', 'notes' => 'Update 2025'],
            ['key' => 'data_centers', 'group' => 'summary', 'title' => 'Pusat Data & Server', 'value' => '8', 'unit' => 'Unit', 'notes' => 'Aktif & Terpelihara'],
            ['key' => 'public_info_requests', 'group' => 'summary', 'title' => 'Layanan Informasi Publik', 'value' => '1.245', 'unit' => 'Permintaan', 'notes' => 'Tahun 2025'],

            // Infrastruktur TIK
            ['key' => 'telecom_towers', 'group' => 'infrastructure', 'title' => 'Jumlah Menara Telekomunikasi', 'value' => '65', 'unit' => 'Unit', 'notes' => null],
            ['key' => 'fiber_optic_length', 'group' => 'infrastructure', 'title' => 'Panjang Jaringan FO', 'value' => '120', 'unit' => 'km', 'notes' => null],
            ['key' => 'internet_connected_villages', 'group' => 'infrastructure', 'title' => 'Desa/Kelurahan Terhubung Internet', 'value' => '92', 'unit' => '%', 'notes' => null],
            ['key' => 'public_cctv', 'group' => 'infrastructure', 'title' => 'Jumlah CCTV Publik', 'value' => '150', 'unit' => 'Titik', 'notes' => null],

            // Pelayanan & Pengaduan
            ['key' => 'reports_in', 'group' => 'service', 'title' => 'Laporan Masuk', 'value' => '325', 'unit' => 'Laporan', 'notes' => null],
            ['key' => 'reports_done', 'group' => 'service', 'title' => 'Laporan Selesai', 'value' => '300', 'unit' => 'Laporan', 'notes' => null],
            ['key' => 'avg_resolution_time', 'group' => 'service', 'title' => 'Rata-rata Waktu Penyelesaian', 'value' => '3', 'unit' => 'Hari', 'notes' => null],
            ['key' => 'satisfaction_rate', 'group' => 'service', 'title' => 'Tingkat Kepuasan', 'value' => '89', 'unit' => '%', 'notes' => null],

            // Akses Internet
            ['key' => 'household_connectivity', 'group' => 'internet_access', 'title' => 'Persentase Rumah Tangga Terkoneksi', 'value' => '78', 'unit' => '%', 'notes' => null],
            ['key' => 'active_internet_users', 'group' => 'internet_access', 'title' => 'Pengguna Internet Aktif', 'value' => '280.000', 'unit' => 'Orang', 'notes' => null],
            ['key' => 'free_access_points', 'group' => 'internet_access', 'title' => 'Titik Akses Gratis', 'value' => '125', 'unit' => 'Titik', 'notes' => null],
            ['key' => 'blankspot_areas', 'group' => 'internet_access', 'title' => 'Wilayah Blankspot', 'value' => '8', 'unit' => 'Desa', 'notes' => null],

            // Data & Statistik Digital
            ['key' => 'open_datasets', 'group' => 'digital_data', 'title' => 'Jumlah Dataset Terbuka', 'value' => '120', 'unit' => 'Dataset', 'notes' => null],
            ['key' => 'public_service_apps', 'group' => 'digital_data', 'title' => 'Aplikasi Layanan Publik', 'value' => '15', 'unit' => 'Aplikasi', 'notes' => null],
            ['key' => 'website_visits', 'group' => 'digital_data', 'title' => 'Kunjungan Website Diskominfo', 'value' => '150.000', 'unit' => '/ tahun', 'notes' => null],
            ['key' => 'active_social_media', 'group' => 'digital_data', 'title' => 'Media Sosial Aktif', 'value' => '5', 'unit' => 'Platform', 'notes' => null],
        ];

        DB::table('statistics')->insert($data);
    }
}