<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ppid;

class PpidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'badan_publik' => 'Sekretariat Daerah',
                'alamat' => 'Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'penyusunan kebijakan, pengoordinasian seluruh OPD, dan pelayanan administratif untuk mendukung tugas Bupati',
            ],
            [
                'badan_publik' => 'Sekretariat DPRD',
                'alamat' => 'Jl. Pahlawan No. 2, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'memfasilitasi dan mendukung kelancaran tugas, fungsi, dan wewenang DPRD Kabupaten Jeneponto.',
            ],
            [
                'badan_publik' => 'Inspektorat',
                'alamat' => 'Jl. M. Ishak Iskandar (Jalur Lingkar), Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'Aparat Pengawasan Intern Pemerintah (APIP) yang bertanggung jawab langsung kepada Bupati',
            ],
            [
                'badan_publik' => 'Dinas Perdagangan dan Perindustrian',
                'alamat' => 'Jl. Pelita, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'Mengawasi stabilitas harga bahan pokok di pasar tradisional, tera ulang alat ukur, serta membina industri kecil menengah (IKM)',
            ],
            [
                'badan_publik' => 'Dinas Pertanian',
                'alamat' => 'Jl. M. Ali Gani, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'Membina kelompok tani, menyalurkan pupuk subsidi, mengelola penyuluhan pertanian, serta mengembangkan komoditas unggulan (seperti jagung dan padi).',
            ],
            [
                'badan_publik' => 'Dinas Pariwisata',
                'alamat' => 'Jl. Lanto Dg. Pasewang, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'Mengembangkan destinasi wisata (seperti wisata pantai dan perbukitan), mempromosikan ekonomi kreatif, serta mengelola pembinaan kelompok sadar wisata (Pokdarwis).',
            ],
            [
                'badan_publik' => 'Dinas Kelautan dan Perikanan',
                'alamat' => 'Jl. Pahlawan, Kelurahan Empoang, Kecamatan Binamu',
                'ruang_lingkup' => 'Memberdayakan nelayan lokal, mengelola budidaya laut/tambak (termasuk rumput laut dan budidaya garam), serta memberikan bantuan alat tangkap.',
            ],
        ];

        foreach ($data as $item) {
            Ppid::firstOrCreate(
                ['badan_publik' => $item['badan_publik']],
                $item
            );
        }
    }
}
