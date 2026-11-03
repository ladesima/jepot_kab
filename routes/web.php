<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KepalaDaerahController;
use App\Http\Controllers\Admin\PejabatDaerahController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BeritaUserController;
use App\Http\Controllers\User\AlbumUserController;
use App\Http\Controllers\User\KepalaDaerahUserController;
use App\Http\Controllers\User\KategoriUserController;
use App\Http\Controllers\User\ArtikelUserController;
use App\Http\Controllers\User\PenghargaanController;
use App\Http\Controllers\Admin\PenghargaanAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\User\StatistikController;
use App\Http\Controllers\Admin\StatistikAdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\User\SekretarisDaerahController;
use App\Http\Controllers\Admin\SekretarisDaerahAdminController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\Admin\KecamatanController as AdminKecamatan;
use App\Http\Controllers\Admin\DesaController as AdminDesa;
use App\Http\Controllers\User\PengumumanUserController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\IPKAdminController;
use App\Http\Controllers\Admin\MCSPAdminController;
use App\Http\Controllers\Admin\PpidAdminController;
use App\Http\Controllers\User\PpidController;
use App\Http\Controllers\User\SuratTugasUserController;

// Surat Tugas & SPD Online
Route::get('/surat-tugas', [SuratTugasUserController::class, 'index'])->name('user.surat-tugas');
Route::post('/surat-tugas', [SuratTugasUserController::class, 'store'])->name('user.surat-tugas.store');
Route::get('/surat-tugas/search-pegawai', [SuratTugasUserController::class, 'searchPegawai'])->name('user.surat-tugas.search-pegawai');
Route::get('/surat-tugas/cetak-st/{id}', [SuratTugasUserController::class, 'cetakSt'])->whereNumber('id')->name('user.surat-tugas.cetak-st');
Route::get('/surat-tugas/cetak-spd/{id}', [SuratTugasUserController::class, 'cetakSpd'])->whereNumber('id')->name('user.surat-tugas.cetak-spd');
Route::get('/surat-tugas/export-doc/{id}/{type}', [SuratTugasUserController::class, 'exportDoc'])->whereNumber('id')->name('user.surat-tugas.export-doc');
Route::delete('/surat-tugas/{id}', [SuratTugasUserController::class, 'destroy'])->whereNumber('id')->name('user.surat-tugas.destroy');

//baru user
Route::get('/ipk', [App\Http\Controllers\IPKController::class, 'index'])->name('ipk');
Route::get('/ipk/detail/{id}', [App\Http\Controllers\IPKController::class, 'show'])->whereNumber('id')->name('ipk.show');
Route::get('/ipk/file/{id}', [App\Http\Controllers\IPKController::class, 'file'])->whereNumber('id')->name('ipk.file');
Route::get('/ipk/download/{id}', [App\Http\Controllers\IPKController::class, 'download'])->whereNumber('id')->name('ipk.download');
Route::get('/mcsp-kopsurgah-kpk', [App\Http\Controllers\MCSPController::class, 'index'])->name('mcsp');
Route::get('/ppid', [PpidController::class, 'index'])->name('user.ppid');

//baru admin ipk mcsp
Route::prefix('admin')->group(function () {

    Route::get('/ipk', [IPKAdminController::class,'index'])->name('admin.ipk');
    Route::get('/ipk/create', [IPKAdminController::class,'create'])->name('admin.ipk.create');
    Route::post('/ipk/store', [IPKAdminController::class,'store'])->name('admin.ipk.store');
    Route::get('/ipk/edit/{id}', [IPKAdminController::class,'edit'])->whereNumber('id')->name('admin.ipk.edit');
    Route::post('/ipk/update/{id}', [IPKAdminController::class,'update'])->whereNumber('id')->name('admin.ipk.update');
    Route::delete('/ipk/delete/{id}', [IPKAdminController::class,'destroy'])->whereNumber('id')->name('admin.ipk.delete');


    Route::get('/mcsp', [MCSPAdminController::class,'index'])->name('admin.mcsp');
    Route::get('/mcsp/create', [MCSPAdminController::class,'create'])->name('admin.mcsp.create');
    Route::post('/mcsp/store', [MCSPAdminController::class,'store'])->name('admin.mcsp.store');
    Route::get('/mcsp/edit/{id}', [MCSPAdminController::class,'edit'])->whereNumber('id')->name('admin.mcsp.edit');
    Route::post('/mcsp/update/{id}', [MCSPAdminController::class,'update'])->whereNumber('id')->name('admin.mcsp.update');
    Route::delete('/mcsp/delete/{id}', [MCSPAdminController::class,'destroy'])->whereNumber('id')->name('admin.mcsp.delete');

    // PPID
    Route::get('/ppid', [PpidAdminController::class, 'index'])->name('admin.ppid.index');
    Route::post('/ppid', [PpidAdminController::class, 'store'])->name('admin.ppid.store');
    Route::put('/ppid/{ppid}', [PpidAdminController::class, 'update'])->whereNumber('ppid')->name('admin.ppid.update');
    Route::delete('/ppid/{ppid}', [PpidAdminController::class, 'destroy'])->whereNumber('ppid')->name('admin.ppid.destroy');

});


/*
|--------------------------------------------------------------------------
| PENGUMUMAN
|--------------------------------------------------------------------------
*/

/*
| Halaman daftar pengumuman
*/
Route::get('/pengumuman', [
    PengumumanUserController::class,
    'index',
])->name('user.pengumuman');

/*
| Preview dokumen PDF
|
| Route preview harus diletakkan sebelum /pengumuman/{id}.
*/
Route::get('/pengumuman/preview/{id}', [
    PengumumanUserController::class,
    'preview',
])
    ->whereNumber('id')
    ->name('pengumuman.preview');

/*
| URL lama berbasis ID
|
| Contoh:
| /pengumuman/9
|
| Akan diarahkan menjadi:
| /judul-pengumuman
*/
Route::get('/pengumuman/{id}', [
    PengumumanUserController::class,
    'redirectOldUrl',
])
    ->whereNumber('id')
    ->name('user.detail-pengumuman.lama');

/*
|--------------------------------------------------------------------------
| URL lama berdasarkan ID
|--------------------------------------------------------------------------
| /pengumuman/9 akan otomatis dialihkan ke URL berbentuk judul.
*/
Route::get('/pengumuman/{id}', [
    PengumumanUserController::class,
    'redirectOldUrl',
])
    ->whereNumber('id')
    ->name('user.detail-pengumuman.lama');

Route::get('/kecamatan', [KecamatanController::class, 'index'])
    ->name('kecamatan.index');

Route::get('/kecamatan/{id}', [KecamatanController::class, 'show'])
    ->name('kecamatan.show');





// ROUTE UNTUK TAMPILAN UMUM

Route::get('/kepala-daerah/bupati', [KepalaDaerahUserController::class, 'bupati'])
    ->name('user.bupati');
Route::get('/wakilbupati', [KepalaDaerahUserController::class, 'wakilBupati'])->name('user.wakil-bupati');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/beritauser', [BeritaUserController::class, 'index'])->name('user.berita');
Route::get('/detailberita/{id}', [BeritaUserController::class, 'show'])->name('berita.show');


Route::get('/artikel', [ArtikelUserController::class, 'index'])->name('user.artikel');
Route::get('/artikel/{artikel}', [ArtikelUserController::class, 'show'])->name('user.detail-artikel');

Route::get('/galeri', [AlbumUserController::class, 'albums'])->name('user.galeri');
Route::get('/detailalbum/{id}', [AlbumUserController::class, 'show'])->name('album.show');  

Route::get('/sekretaris-daerah', [SekretarisDaerahController::class, 'index'])
    ->name('user.sekretaris-daerah');

Route::get('/pemerintahan', [PemerintahanController::class, 'index'])->name('pemerintahan');
Route::view('/struktur-organisasi', 'user.struktur-organisasi')->name('user.struktur-organisasi');
Route::view('/ruang-lingkup-pemerintahan', 'user.ruang-lingkup-pemerintahan')->name('user.ruang-lingkup-pemerintahan');


Route::get('/slideradmin', [SliderController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider');

Route::get('/slideradmin/create', [SliderController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-slider');

Route::post('/slideradmin', [SliderController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.store');

Route::get('/slideradmin/{slider}/edit', [SliderController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-slider');

Route::put('/slideradmin/{slider}', [SliderController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.update');

Route::delete('/slideradmin/{slider}', [SliderController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.slider.destroy');

Route::get('/visitor-stats', [VisitorController::class, 'stats']);


// ROUTE UNTUK ADMIN PEGAWAI
Route::get('/pegawaiadmin', [PegawaiController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.struktur');

Route::get('/pegawaiadmin/create', [PegawaiController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-pegawai');

Route::post('/pegawaiadmin', [PegawaiController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.store');

Route::get('/pegawaiadmin/{pegawai}/edit', [PegawaiController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-pegawai');

Route::put('/pegawaiadmin/{pegawai}', [PegawaiController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.update');

Route::delete('/pegawaiadmin/{pegawai}', [PegawaiController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pegawai.destroy');

Route::prefix('admin')->group(function () {
    Route::resource('opd', OpdController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::resource('kecamatan', AdminKecamatan::class);
    Route::resource('desa', AdminDesa::class);

});

// ROUTE UNTUK ADMIN PENGUMUMAN
Route::prefix('adminpanel')->middleware('auth')->group(function () {

    Route::get('/pengumuman', 
        [PengumumanController::class, 'index'])
        ->name('admin.pengumuman');

    Route::get('/pengumuman/create', 
        [PengumumanController::class, 'create'])
        ->name('admin.pengumuman.create');

    Route::post('/pengumuman/store', 
        [PengumumanController::class, 'store'])
        ->name('admin.pengumuman.store');

    /* 🔥 TAMBAHAN WAJIB */
    Route::get('/pengumuman/edit/{id}', 
        [PengumumanController::class, 'edit'])
        ->name('admin.pengumuman.edit');

    Route::put('/pengumuman/update/{id}', 
        [PengumumanController::class, 'update'])
        ->name('admin.pengumuman.update');

    Route::delete('/pengumuman/delete/{id}', 
        [PengumumanController::class, 'destroy'])
        ->name('admin.pengumuman.delete');
});

// PENGHARGAAN ROUTES
Route::get('/penghargaan', [PenghargaanController::class, 'index'])->name('user.penghargaan');

Route::get('/penghargaanadmin', [PenghargaanAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan');

Route::get('/penghargaanadmin/create', [PenghargaanAdminController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-penghargaan');

Route::post('/penghargaanadmin', [PenghargaanAdminController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-store');

Route::get('/penghargaanadmin/{id}/edit', [PenghargaanAdminController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-penghargaan');

Route::put('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan-update');

Route::delete('/penghargaanadmin/{id}', [PenghargaanAdminController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.penghargaan.destroy');


Route::view('/visimisi', 'user.visi-misi')->name('user.visi-misi');
Route::view('/gambaranumum', 'user.gambaran-umum')->name('user.gambaran-umum');

// ROUTE UNTUK STATISTIK
Route::get('/datastatistik', [StatistikController::class, 'index'])->name('user.data-statistik');

Route::get('/datastatistikadmin', [StatistikAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik');

Route::get('/datastatistikadmin/create', [StatistikAdminController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-data-statistik');

Route::post('/datastatistikadmin', [StatistikAdminController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.store');

Route::get('/datastatistik/{statistic}/edit', [StatistikAdminController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-data-statistik');

Route::put('/datastatistikadmin/{statistic}', [StatistikAdminController::class, 'update']) 
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.update');

Route::delete('/datastatistikadmin/{statistic}', [StatistikAdminController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.data-statistik.destroy');



Route::get('/kategori/{kategori}', [KategoriUserController::class, 'show'])->name('user.kategori');



// ROUTE UNTUK ADMIN
Route::get('/dashboard', [DashboardAdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::get('/artikeladmin', [ArtikelController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel');

Route::get('/artikeladmin/create', [ArtikelController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-artikel');

Route::post('/artikeladmin', [ArtikelController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-store');

Route::get('/artikeladmin/{id}/edit', [ArtikelController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-artikel');

Route::put('/artikeladmin/{id}', [ArtikelController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-update');

Route::delete('/artikeladmin/{id}', [ArtikelController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.artikel-destroy');

// ROUTE UNTUK ADMIN GALERI

Route::get('/admin/galeri/{album}', [AlbumController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('admin.galeri');



// END ROUTE ADMIN GALERI

Route::get('/albumadmin', [AlbumController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.album');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // == ROUTE UNTUK MANAJEMEN ALBUM ==
    Route::get('/albums', [AlbumController::class, 'index'])->name('admin.album');
    Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');
    // Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('admin.galeri'); // Ini mengarah ke Kelola Foto
    Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');

    // == ROUTE UNTUK MANAJEMEN FOTO (di dalam album) ==
    Route::post('/photos', [PhotoController::class, 'store'])->name('photo.store');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');
    Route::put('/photos/{photo}/set-cover', [PhotoController::class, 'setCover'])->name('photo.setcover');

});



// PEJABAT DAERAH ROUTES

Route::get('/pejabatdaerahadmin', [PejabatDaerahController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah');

Route::get('/pejabatdaerahadmin/create', [PejabatDaerahController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-pejabat-daerah');

Route::post('/pejabatdaerahadmin', [PejabatDaerahController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah-store');

Route::get('/pejabat-daerah/{id}/edit', [PejabatDaerahController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-pejabat-daerah');

Route::put('/pejabat-daerah/{id}', [PejabatDaerahController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-pejabat-daerah');

Route::delete('/pejabat-daerah/{id}', [PejabatDaerahController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pejabat-daerah-destroy');



// KATEGORI BERITA ROUTES
Route::get('/beritaadmin', [BeritaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita');

Route::get('/beritaadmin/create', [BeritaController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita');

Route::post('/beritaadmin', [BeritaController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('admin.tambah-berita-store');

Route::get('/beritaadmin/{id}/edit', [BeritaController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-berita');

Route::put('/beritaadmin/{id}', [BeritaController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-berita');

Route::delete('/beritaadmin/{id}', [BeritaController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita-destroy');




// KEPALA DAERAH ROUTES

Route::get('/kepaladaerahadmin', [KepalaDaerahController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.kepala-daerah');

Route::get('/kepala-daerah/{id}/edit', [KepalaDaerahController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-kepala-daerah');

Route::put('/kepala-daerah/{id}', [KepalaDaerahController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update');

/*
|--------------------------------------------------------------------------
| SEKRETARIS DAERAH (ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/sekretarisdaerahadmin', [SekretarisDaerahAdminController::class, 'index'])
    ->name('admin.sekretaris-daerah');


Route::get('/sekretarisdaerahadmin/create', [SekretarisDaerahAdminController::class, 'create'])
    ->name('admin.tambah-sekretaris-daerah');

Route::post('/sekretaris-daerah', [SekretarisDaerahAdminController::class, 'store'])
    ->name('admin.sekretaris-daerah.store');

Route::put('/sekretaris-daerah/{id}', [SekretarisDaerahAdminController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.sekretaris-daerah.update');

Route::get('/sekretarisdaerahadmin/{id}/edit', [SekretarisDaerahAdminController::class, 'edit'])
    ->name('admin.edit-sekretaris-daerah');

Route::delete('/sekretarisdaerahadmin/{id}', [SekretarisDaerahAdminController::class, 'destroy'])
    ->name('admin.sekretaris-daerah.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [
        ProfileController::class,
        'edit',
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update',
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy',
    ])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ROUTE AUTENTIKASI
|--------------------------------------------------------------------------
| Harus diletakkan sebelum route slug umum.
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| DETAIL PENGUMUMAN BERDASARKAN SLUG
|--------------------------------------------------------------------------
| Route ini wajib menjadi route paling bawah karena bisa menangkap seluruh
| URL yang hanya memiliki satu segmen.
|
| Contoh:
| https://jenepontokab.go.id/judul-pengumuman
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', [
    PengumumanUserController::class,
    'show',
])
    ->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*')
    ->name('user.detail-pengumuman');

/*
|--------------------------------------------------------------------------
| Detail pengumuman berdasarkan judul
|--------------------------------------------------------------------------
| Route ini harus berada paling bawah karena URL langsung berada setelah
| nama domain, misalnya:
|
| https://jenepontokab.go.id/judul-pengumuman
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
