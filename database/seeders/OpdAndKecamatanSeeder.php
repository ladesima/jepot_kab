<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opd;
use App\Models\Kecamatan;

class OpdAndKecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $opds = [
            [
                'nama_opd' => 'Sekretariat Daerah',
                'kepala_dinas' => 'Dr. Aspa Muji, S.STP., M.Si.',
                'website' => null,
                'riwayat_jabatan' => "~ Sekda Definitif\n~ Penanggungjawab Sekda\n~ Kasat Pol PP\n~ Plt. Kadis Dukcapil\n~ Kadis Perhubungan Jeneponto.",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Sekretariat DPRD',
                'kepala_dinas' => 'Mustakim, S.STP., M.AP.',
                'website' => null,
                'riwayat_jabatan' => "~ Sekretaris Dewan (Sekwan) DPRD Kabupaten Jeneponto\n~ Sekretaris Inspektorat Kabupaten Jeneponto",
                'alamat' => 'Jl. Pahlawan No. 2, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Inspektorat',
                'kepala_dinas' => 'Maskur, S.Ag., M.H.',
                'website' => null,
                'riwayat_jabatan' => "~ Pelaksana Harian (Plh) Sekretaris Daerah (Sekda) Kabupaten Jeneponto\n~ Penjabat (Pj) Sekretaris Daerah Kabupaten Jeneponto.",
                'alamat' => 'Jl. M. Ishak Iskandar (Jalur Lingkar), Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Komunikasi, Informatika dan Statistik',
                'kepala_dinas' => 'Achmad, S.P., M.Adm.',
                'website' => null,
                'riwayat_jabatan' => "~ Kepala Dinas Pertanian Kabupaten Jeneponto",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Perdagangan dan Perindustrian',
                'kepala_dinas' => 'Nirmala Syuaib, ST., M.Si.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Pelita, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pertanian',
                'kepala_dinas' => 'Bambang Hariyanto, SP., MM.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. M. Ali Gani, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pariwisata',
                'kepala_dinas' => 'Rusman M. Rukka, S.S., M.M.',
                'website' => null,
                'riwayat_jabatan' => "~ Sekretaris Dinas Kepemudaan dan Olahraga (Dispora) Kabupaten Jeneponto (Sekaligus Pelaksana Tugas / Plt. Kepala Dispora Jeneponto)\n~ Kepala Dinas Pariwisata Kabupaten Jeneponto\n~ Kepala Dinas Pariwisata dan Ekonomi Kreatif Kabupaten Jeneponto",
                'alamat' => 'Jl. Lanto Dg. Pasewang, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Kelautan dan Perikanan',
                'kepala_dinas' => 'Abd Rajab, S.Pi., M.Si.',
                'website' => null,
                'riwayat_jabatan' => "~ Kepala Dinas Perikanan dan Kelautan Kabupaten Jeneponto\n~ Camat Rumbia, Kabupaten Jeneponto",
                'alamat' => 'Jl. Pahlawan, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Perpustakaan dan Kearsipan',
                'kepala_dinas' => 'Taufik, S.E., M.M.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. M. Ali Gassing No. 2, Belokallong, Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Kepemudaan dan Olah Raga',
                'kepala_dinas' => 'M. Emil Ilyas Mattewakkang',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Pahlawan, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
                'kepala_dinas' => 'Dr. Hj. Meriyani, S.P., M.Si.',
                'website' => null,
                'riwayat_jabatan' => "~ Pegawai/Pejabat di Dinas Ketahanan Pangan Kabupaten Jeneponto",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 30A, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Koperasi, Usaha Kecil, dan Menengah',
                'kepala_dinas' => 'Dr. Hj. Mernawati, S.IP., M.Si.',
                'website' => null,
                'riwayat_jabatan' => "~ Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Jeneponto",
                'alamat' => 'Jl. Pahlawan No. 12, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Perhubungan',
                'kepala_dinas' => 'Andi Kamil A. Lomba, S.AP., MM',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Drs. H. Radjamilo.MP No. 03, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pengendalian Penduduk dan Keluarga Berencana',
                'kepala_dinas' => 'Dr. St. Meriam, S.STP., M.Si.',
                'website' => null,
                'riwayat_jabatan' => "~ Kepala Bagian Organisasi dan Tata Laksana (Ortala)\n~ Pelaksana Tugas (Plt.) beberapa jabatan administrator di lingkungan Pemkab Jeneponto",
                'alamat' => 'Jl. Abdul Jalil Sikki No. 10, Romanga, Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pemberdayaan Masyarakat dan Desa',
                'kepala_dinas' => 'M. Basuki Baharuddin, S.E., M.M.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Abdul Jalil Sikki Romanga, Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Tenaga Kerja & Transmigrasi',
                'kepala_dinas' => 'Abdul Mushawwir Sam, S.STP',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Abdul Jalil Sikki, Kelurahan Balang (Romanga), Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Kependudukan dan Pencatatan Sipil',
                'kepala_dinas' => 'Dr. Mustaufiq, S.IP., SE., SH., M.Si., M.H.',
                'website' => null,
                'riwayat_jabatan' => "~ Pelaksana Tugas (Plt) Kepala Dinas Komunikasi dan Informatika (Kominfo) Kabupaten Jeneponto\n~ Kepala Bagian (Kabag) Protokol / Kabag Humas dan Protokol Pemerintah Kabupaten Jeneponto",
                'alamat' => 'Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Lingkungan Hidup',
                'kepala_dinas' => 'Suardi, S.E., M.M.',
                'website' => null,
                'riwayat_jabatan' => "~ Staf Ahli Bupati Jeneponto Bidang Ekonomi dan Keuangan\n~ Staf Ahli Bupati Jeneponto Bidang Pembangunan dan Kemasyarakatan",
                'alamat' => 'Jl. Ishak Iskandar, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Ketahanan Pangan',
                'kepala_dinas' => 'Rachmat Sasmito',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Abdul Jalil Sikki (Kawasan Romanga), Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',
                'kepala_dinas' => 'Dr. Farida Mappatunru.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Alim Bachri Dg. Rewa, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Sosial',
                'kepala_dinas' => 'Syamsuddin L., S.E., M.M.',
                'website' => null,
                'riwayat_jabatan' => "~ Ketua Harian PERTINA (Persatuan Tinju Amatir Indonesia) Kabupaten Jeneponto",
                'alamat' => 'Jl. Pahlawan, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Perumahan Rakyat dan Kawasan Permukiman dan Pertanahan',
                'kepala_dinas' => 'Dr. H. Manrancai Sally, S.STP., M.Si.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Sultan Hasanuddin No. 20, Bontosunggu, Kelurahan Balang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pekerjaan Umum dan Penataan Ruang',
                'kepala_dinas' => 'H. Muhammad Amin, S.T., M.AP.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Pelita, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Kesehatan',
                'kepala_dinas' => 'Dr. Hj. Syusanty A. Mansyur, SKM., M.Kes., FISQua.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Abdul Jalil Sikki No. 05, Romanga, Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Dinas Pendidikan dan Kebudayaan',
                'kepala_dinas' => 'Alamsyah, S.E., M.M.',
                'website' => null,
                'riwayat_jabatan' => "~ Camat Arungkeke\n~ Pelaksana (Plt.) Kepala Dinas Pendidikan dan Kebudayaan Kabupaten Jeneponto",
                'alamat' => 'Jl. Abdul Jalil Sikki No. 29, Romanga, Kelurahan Balang Toa, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah',
                'kepala_dinas' => 'Dr. H. Alfian Afandy Syam, S.T., M.T., Ph.D.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Pengelola Keuangan dan Aset Daerah',
                'kepala_dinas' => 'Mustakbirin, S.H., M.H.',
                'website' => null,
                'riwayat_jabatan' => "~ Plt. Kepala Badan Keuangan dan Aset Daerah (BKAD) Kabupaten Jeneponto\n~ Asisten Administrasi Umum (Asisten III) Sekretariat Daerah Kabupaten Jeneponto.",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Pendapatan Daerah',
                'kepala_dinas' => 'Nuzuldin Ngallo, ST., MT.',
                'website' => null,
                'riwayat_jabatan' => "~ Staf Bappeda Kabupaten Jeneponto\n~ Sekretaris Badan Perencanaan Pembangunan, Penelitian, dan Pengembangan Daerah (Bappeda) Kabupaten Jeneponto\n~ Asisten Administrasi Umum (Asisten III) Sekretariat Daerah Kabupaten Jeneponto",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
                'kepala_dinas' => 'Ahmad Saparuddin, S.STP., M.M.',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Kesatuan Bangsa dan Politik',
                'kepala_dinas' => 'Kamaruddin, S.E., M.AP.',
                'website' => null,
                'riwayat_jabatan' => "~ Sekretaris Dinas Pekerjaan Umum (PU) / PUPR Kabupaten Jeneponto",
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
            ],
            [
                'nama_opd' => 'Badan Penanggulangan Bencana Daerah',
                'kepala_dinas' => 'Andi Patoppoi, S.Sos Kr Nyau',
                'website' => null,
                'riwayat_jabatan' => null,
                'alamat' => 'Jl. Drs. H. Radjamilo.MP No. 03, Kelurahan Empoang, Kecamatan Binamu',
            ],
        ];

        foreach ($opds as $data) {
            Opd::updateOrCreate(
                ['nama_opd' => $data['nama_opd']],
                $data
            );
        }

        $camats = [
            [
                'nama_kecamatan' => 'Binamu',
                'kepala_camat' => 'Ir. Rizal, HM., M.AP',
                'riwayat_jabatan' => '~ Pelaksana Tugas (Plt.) Camat Binamu, Kabupaten Jeneponto',
                'alamat' => 'Jalan Lingkar No. 32, Kelurahan Bontosunggu',
            ],
            [
                'nama_kecamatan' => 'Bangkala',
                'kepala_camat' => 'Uud Panca, S.Sos., M.M.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Makassar - Jeneponto, Kelurahan Benteng',
            ],
            [
                'nama_kecamatan' => 'Bangkala Barat',
                'kepala_camat' => 'Andi Ijo Paramisang, S.Sos',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Buludoang, Desa Bulujaya',
            ],
            [
                'nama_kecamatan' => 'Tamalatea',
                'kepala_camat' => 'Haryadi, S.T.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Makassar - Bantaeng, Kelurahan Tonrokassi',
            ],
            [
                'nama_kecamatan' => 'Bontoramba',
                'kepala_camat' => 'Muhammad Nurlewa Saad, S. Kom',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Bontoramba, Desa Bontoramba',
            ],
            [
                'nama_kecamatan' => 'Turatea',
                'kepala_camat' => 'Ahmad H. Zakkir, S.Sos., M.Si.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Turatea, Desa Langkura',
            ],
            [
                'nama_kecamatan' => 'Kelara',
                'kepala_camat' => 'M. Ilyas T., S.E.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Tolo, Kelurahan Tolo',
            ],
            [
                'nama_kecamatan' => 'Rumbia',
                'kepala_camat' => 'Ahmad Affandy, S.E., M.M.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Rumbia - Gowa, Desa Rumbia',
            ],
            [
                'nama_kecamatan' => 'Batang',
                'kepala_camat' => 'Mustari, S.IP.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Jeneponto - Bantaeng, Kelurahan Togo-Togo',
            ],
            [
                'nama_kecamatan' => 'Arungkeke',
                'kepala_camat' => 'Muh. Ramis, S.IP., M.P.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Arungkeke, Desa Arungkeke',
            ],
            [
                'nama_kecamatan' => 'Tarowang',
                'kepala_camat' => 'Taufik, S.Sos., M.M.',
                'riwayat_jabatan' => null,
                'alamat' => 'Jalan Poros Jeneponto - Bantaeng, Desa Tarowang',
            ],
        ];

        foreach ($camats as $camat) {
            Kecamatan::updateOrCreate(
                ['nama_kecamatan' => $camat['nama_kecamatan']],
                $camat
            );
        }
    }
}
