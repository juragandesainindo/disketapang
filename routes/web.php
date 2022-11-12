<?php

use App\Http\Controllers\AddMoreInputController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackgroundImageLoginController;
use App\Http\Controllers\DataUserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\PanduanAplikasiController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\InformasiAplikasiController;

use App\Http\Controllers\Distribusi\CadanganBulogController;
use App\Http\Controllers\Distribusi\CadanganPanganController;
use App\Http\Controllers\Distribusi\HargaPanganController;
use App\Http\Controllers\Distribusi\FlyerController;
use App\Http\Controllers\Distribusi\PasarController;
use App\Http\Controllers\Distribusi\UnitDistributorController;
use App\Http\Controllers\Distribusi\DaftarGudangController;
use App\Http\Controllers\Distribusi\DataKampungPanganController;

use App\Http\Controllers\Umum\PegawaiController;
use App\Http\Controllers\Umum\PetaJabatanController;
use App\Http\Controllers\Umum\SopController;
use App\Http\Controllers\Umum\KendaraanController;

use App\Http\Controllers\Konsumsi\KelompokWanitaTaniController;
use App\Http\Controllers\Konsumsi\BantuanKWTController;

use App\Http\Controllers\Keuangan\ReferensiTufoksiController;
use App\Http\Controllers\Keuangan\LaporanRealisasiController;
use App\Http\Controllers\Keuangan\DpaController;
use App\Http\Controllers\Keuangan\LaporanKeuanganController;
use App\Http\Controllers\Keuangan\RenstraController;

use App\Http\Controllers\Kerawanan\DktController;
use App\Http\Controllers\Kerawanan\SkpgController;
use App\Http\Controllers\Kerawanan\FsvaController;
use App\Http\Controllers\Kerawanan\PPHKetersediaanController;
use App\Http\Controllers\Kerawanan\DataPrognosaController;
use App\Http\Controllers\Kerawanan\KTKamapanController;

use App\Http\Controllers\Keamanan\KeamananPanganController;
use App\Http\Controllers\Keamanan\PengusulSertifikasiController;
use App\Http\Controllers\Keamanan\DataPanganLokalController;
use App\Http\Controllers\Keamanan\KonsumsiPanganController;
use App\Http\Controllers\LaporanAssetController;
use App\Http\Controllers\Umum\Asset\AtbController;
use App\Http\Controllers\Umum\Asset\KibAController;
use App\Http\Controllers\umum\asset\kibb\AssetUmumBastController;
use App\Http\Controllers\umum\asset\KibB\AssetUmumSkBastController;
use App\Http\Controllers\Umum\Asset\KibBController;
use App\Http\Controllers\Umum\Asset\KibCController;
use App\Http\Controllers\Umum\Asset\KibDController;
use App\Http\Controllers\Umum\Asset\KibEController;
use App\Http\Controllers\Umum\Asset\KibFController;
use App\Http\Controllers\Umum\Asset\Laporan\LaporanRekonController;
use App\Http\Controllers\Umum\Asset\MappingAssetController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanAtbController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibAController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibBController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibCController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibDController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibEController;
use App\Http\Controllers\Umum\Asset\Perawatan\PerawatanKibFController;
use App\Http\Controllers\umum\PegawaiAnakController;
use App\Http\Controllers\umum\PegawaiJabatanController;
use App\Http\Controllers\umum\PegawaiOrganisasiController;
use App\Http\Controllers\umum\PegawaiOrtuController;
use App\Http\Controllers\Umum\PegawaiPangkatController;
use App\Http\Controllers\umum\PegawaiPasanganController;
use App\Http\Controllers\umum\PegawaiPelatihanKepemimpinanController;
use App\Http\Controllers\umum\PegawaiPelatihanTeknisController;
use App\Http\Controllers\umum\PegawaiPendidikanUmumController;
use App\Http\Controllers\umum\PegawaiPenghargaanController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('panduan-aplikasi', [PanduanAplikasiController::class, 'index']);

    // ----------------------------- Data User Login ------------------------------//
    Route::get('data-user', [DataUserController::class, 'index'])->name('data-user.index');
    Route::get('data-user/create', [DataUserController::class, 'create'])->name('data-user.create');
    Route::post('data-user', [DataUserController::class, 'store'])->name('data-user.store');
    Route::get('data-user/{id}/edit', [DataUserController::class, 'edit'])->name('data-user.edit');
    Route::put('data-user/{id}', [DataUserController::class, 'update'])->name('data-user.update');
    Route::delete('data-user/{id}', [DataUserController::class, 'destroy'])->name('data-user.destroy');
    Route::put('data-user-change-password/{id}', [DataUserController::class, 'changePassword'])->name('data-user.changePassword');

    // ----------------------------- Activity Log ------------------------------//
    Route::get('activity', [UserManagementController::class, 'activity']);
    Route::get('activity-export', [UserManagementController::class, 'activityExcel'])->name('activity-export');

    // ----------------------------- Background Image ------------------------------//
    Route::get('background-image', [BackgroundImageLoginController::class, 'index'])->name('background-image.index');
    Route::post('background-image', [BackgroundImageLoginController::class, 'store'])->name('background-image.store');
    Route::put('background-image/{id}', [BackgroundImageLoginController::class, 'update'])->name('background-image.update');
    Route::delete('background-image/{id}', [BackgroundImageLoginController::class, 'destroy'])->name('background-image.destroy');


    // ----------------------------- Sub Umum ------------------------------//
    Route::resource('pegawais', PegawaiController::class);
    Route::delete('pegawais-image/{id}', [PegawaiController::class, 'deleteImage'])->name('pegawais-image.delete');
    Route::get('pegawais-duk-xlxs', [PegawaiController::class, 'excel'])->name('pegawai-duk-xlxs');
    Route::get('pegawai-pdf/{id}', [PegawaiController::class, 'exportPDF'])->name('pegawai-pdf.export');
    Route::get('pegawai-preview-pdf/{id}', [PegawaiController::class, 'previewPDF'])->name('pegawai-preview-pdf');

    Route::post('pegawai-pangkat', [PegawaiPangkatController::class, 'store'])->name('pegawai-pangkat.store');
    Route::put('pegawai-pangkat/{id}', [PegawaiPangkatController::class, 'update'])->name('pegawai-pangkat.update');
    Route::delete('pegawai-pangkat/{id}', [PegawaiPangkatController::class, 'destroy'])->name('pegawai-pangkat.destroy');

    Route::post('pegawai-jabatan', [PegawaiJabatanController::class, 'store'])->name('pegawai-jabatan.store');
    Route::put('pegawai-jabatan/{id}', [PegawaiJabatanController::class, 'update'])->name('pegawai-jabatan.update');
    Route::delete('pegawai-jabatan/{id}', [PegawaiJabatanController::class, 'destroy'])->name('pegawai-jabatan.destroy');

    Route::post('pegawai-pendidikan-umum', [PegawaiPendidikanUmumController::class, 'store'])->name('pegawai-pendidikan-umum.store');
    Route::put('pegawai-pendidikan-umum/{id}', [PegawaiPendidikanUmumController::class, 'update'])->name('pegawai-pendidikan-umum.update');
    Route::delete('pegawai-pendidikan-umum/{id}', [PegawaiPendidikanUmumController::class, 'destroy'])->name('pegawai-pendidikan-umum.destroy');

    Route::post('pegawai-pelatihan-kepemimpinan', [PegawaiPelatihanKepemimpinanController::class, 'store'])->name('pegawai-pelatihan-kepemimpinan.store');
    Route::put('pegawai-pelatihan-kepemimpinan/{id}', [PegawaiPelatihanKepemimpinanController::class, 'update'])->name('pegawai-pelatihan-kepemimpinan.update');
    Route::delete('pegawai-pelatihan-kepemimpinan/{id}', [PegawaiPelatihanKepemimpinanController::class, 'destroy'])->name('pegawai-pelatihan-kepemimpinan.destroy');

    Route::post('pegawai-pelatihan-teknis', [PegawaiPelatihanTeknisController::class, 'store'])->name('pegawai-pelatihan-teknis.store');
    Route::put('pegawai-pelatihan-teknis/{id}', [PegawaiPelatihanTeknisController::class, 'update'])->name('pegawai-pelatihan-teknis.update');
    Route::delete('pegawai-pelatihan-teknis/{id}', [PegawaiPelatihanTeknisController::class, 'destroy'])->name('pegawai-pelatihan-teknis.destroy');

    Route::post('pegawai-organisasi', [PegawaiOrganisasiController::class, 'store'])->name('pegawai-organisasi.store');
    Route::put('pegawai-organisasi/{id}', [PegawaiOrganisasiController::class, 'update'])->name('pegawai-organisasi.update');
    Route::delete('pegawai-organisasi/{id}', [PegawaiOrganisasiController::class, 'destroy'])->name('pegawai-organisasi.destroy');

    Route::post('pegawai-penghargaan', [PegawaiPenghargaanController::class, 'store'])->name('pegawai-penghargaan.store');
    Route::put('pegawai-penghargaan/{id}', [PegawaiPenghargaanController::class, 'update'])->name('pegawai-penghargaan.update');
    Route::delete('pegawai-penghargaan/{id}', [PegawaiPenghargaanController::class, 'destroy'])->name('pegawai-penghargaan.destroy');

    Route::post('pegawai-pasangan', [PegawaiPasanganController::class, 'store'])->name('pegawai-pasangan.store');
    Route::put('pegawai-pasangan/{id}', [PegawaiPasanganController::class, 'update'])->name('pegawai-pasangan.update');
    Route::delete('pegawai-pasangan/{id}', [PegawaiPasanganController::class, 'destroy'])->name('pegawai-pasangan.destroy');

    Route::post('pegawai-anak', [PegawaiAnakController::class, 'store'])->name('pegawai-anak.store');
    Route::put('pegawai-anak/{id}', [PegawaiAnakController::class, 'update'])->name('pegawai-anak.update');
    Route::delete('pegawai-anak/{id}', [PegawaiAnakController::class, 'destroy'])->name('pegawai-anak.destroy');

    Route::post('pegawai-ortu', [PegawaiOrtuController::class, 'store'])->name('pegawai-ortu.store');
    Route::put('pegawai-ortu/{id}', [PegawaiOrtuController::class, 'update'])->name('pegawai-ortu.update');
    Route::delete('pegawai-ortu/{id}', [PegawaiOrtuController::class, 'destroy'])->name('pegawai-ortu.destroy');

    Route::post('pegawai-gaji-berkala', [PegawaiController::class, 'storeGajiBerkala'])->name('pegawai-gaji-berkala.store');
    Route::put('pegawai-gaji-berkala/{id}', [PegawaiController::class, 'updateGajiBerkala'])->name('pegawai-gaji-berkala.update');
    Route::delete('pegawai-gaji-berkala/{id}', [PegawaiController::class, 'destroyGajiBerkala'])->name('pegawai-gaji-berkala.destroy');

    Route::resource('sop', SopController::class);
    Route::resource('peta-jabatan', PetaJabatanController::class);
    Route::resource('kendaraans', KendaraanController::class);
    Route::get('kendaraan-export', [KendaraanController::class, 'export'])->name('kendaraan-export');

    Route::get('mapping-asset', [MappingAssetController::class, 'index'])->name('mapping-asset.index');
    Route::post('mapping-asset', [MappingAssetController::class, 'store'])->name('mapping-asset.store');
    Route::put('mapping-asset/{id}', [MappingAssetController::class, 'update'])->name('mapping-asset.update');
    Route::delete('mapping-asset/{id}', [MappingAssetController::class, 'destroy'])->name('mapping-asset.destroy');

    // Route::get('add-more-input', [AddMoreInputController::class, 'index']);
    // Route::get('add-more-input/create', [AddMoreInputController::class, 'create'])->name('add-more-input.create');
    // Route::post('add-more-input', [AddMoreInputController::class, 'store'])->name('add-more-input.store');

    Route::resource('kib-a', KibAController::class);
    Route::resource('kib-b', KibBController::class);

    Route::post('asset-umum-bast', [AssetUmumBastController::class, 'store'])->name('asset-umum-bast.store');
    Route::put('asset-umum-bast/{id}', [AssetUmumBastController::class, 'update'])->name('asset-umum-bast.update');
    Route::delete('asset-umum-bast/{id}', [AssetUmumBastController::class, 'destroy'])->name('asset-umum-bast.destroy');
    Route::get('asset-umum-bast-pdf/{id}', [AssetUmumBastController::class, 'pdf'])->name('asset-umum-bast-pdf');

    Route::get('preview-sk-asset-umum-bast', [AssetUmumSkBastController::class, 'preview'])->name('preview-sk-asset-umum-bast');
    Route::post('preview-sk-asset-umum-bast', [AssetUmumSkBastController::class, 'store'])->name('preview-sk-asset-umum-bast.store');
    Route::put('preview-sk-asset-umum-bast/{id}', [AssetUmumSkBastController::class, 'update'])->name('preview-sk-asset-umum-bast.update');
    Route::delete('preview-sk-asset-umum-bast/{id}', [AssetUmumSkBastController::class, 'destroy'])->name('preview-sk-asset-umum-bast.destroy');
    Route::get('preview-sk-asset-umum-bast-pdf-kendaraan', [AssetUmumSkBastController::class, 'pdfKendaraan'])->name('preview-sk-asset-umum-bast.pdf-kendaraan');
    Route::get('preview-sk-asset-umum-bast-pdf-lainnya', [AssetUmumSkBastController::class, 'pdfLainnya'])->name('preview-sk-asset-umum-bast.pdf-lainnya');

    Route::put('asset-umum-pegawai/{id}', [KibBController::class, 'updatePemakai'])->name('asset-umum-pegawai.update');
    Route::delete('asset-umum-pegawai/{id}', [KibBController::class, 'deletePemakai'])->name('asset-umum-pegawai.destroy');

    Route::resource('kib-c', KibCController::class);
    Route::resource('kib-d', KibDController::class);
    Route::resource('kib-e', KibEController::class);
    Route::resource('kib-f', KibFController::class);
    Route::resource('asset-tak-berwujud', AtbController::class);
    Route::resource('perawatan-asset-kib-a', PerawatanKibAController::class);
    Route::resource('perawatan-asset-kib-b', PerawatanKibBController::class);
    Route::resource('perawatan-asset-kib-c', PerawatanKibCController::class);
    Route::resource('perawatan-asset-kib-d', PerawatanKibDController::class);
    Route::resource('perawatan-asset-kib-e', PerawatanKibEController::class);
    Route::resource('perawatan-asset-kib-f', PerawatanKibFController::class);
    Route::resource('perawatan-asset-tak-berwujud', PerawatanAtbController::class);

    Route::get('laporan-asset', [LaporanAssetController::class, 'index'])->name('laporan-asset.index');
    Route::get('laporan-asset-pdf', [LaporanAssetController::class, 'pdf'])->name('laporan-asset.pdf');
    Route::get('get-pegawai', [LaporanRekonController::class, 'getPegawai'])->name('getPegawai');
    // Route::get('get-pangkat', [LaporanRekonController::class, 'getPangkat'])->name('getPangkat');
    // Route::get('get-jabatan', [LaporanRekonController::class, 'getJabatan'])->name('getJabatan');
    // Route::get('laporan-rekon/export-rekon/{id}', [LaporanRekonController::class, 'exportRekon'])->name('laporan-rekon-export-rekon');

    // Sub Keuangan
    Route::resource('referensi-tufoksi', ReferensiTufoksiController::class);
    // Route::get('referensi-tufoksi', [ReferensiTufoksiController::class, 'index']);
    // Route::post('referensi-tufoksi', [ReferensiTufoksiController::class, 'store'])->name('referensi-tufoksi.store');
    // Route::put('referensi-tufoksi/{id}', [ReferensiTufoksiController::class, 'update'])->name('referensi-tufoksi.update');
    // Route::delete('referensi-tufoksi/{id}', [ReferensiTufoksiController::class, 'destroy'])->name('referensi-tufoksi.destroy');

    Route::get('evaluasi-renstra', [RenstraController::class, 'index']);
    Route::post('evaluasi-renstra-store', [RenstraController::class, 'store'])->name('evaluasi-renstra-store');
    Route::put('evaluasi-renstra/{id}', [RenstraController::class, 'update'])->name('evaluasi-renstra.update');
    Route::delete('evaluasi-renstra/{id}', [RenstraController::class, 'destroy'])->name('evaluasi-renstra.destroy');
    Route::post('evaluasi-renstra', [RenstraController::class, 'index'])->name('evaluasi-renstra-search');
    Route::get('renstra-excel', [RenstraController::class, 'exportRenstra']);

    Route::get('laporan-realisasi', [LaporanRealisasiController::class, 'index'])->name('laporan-realisasi');
    Route::post('laporan-realisasi', [LaporanRealisasiController::class, 'store'])->name('laporan-realisasi.store');
    Route::get('laporan-realisasi/{id}', [LaporanRealisasiController::class, 'show'])->name('laporan-realisasi.show');
    Route::put('laporan-realisasi/{id}', [LaporanRealisasiController::class, 'update'])->name('laporan-realisasi.update');
    Route::delete('laporan-realisasi/{id}', [LaporanRealisasiController::class, 'destroy'])->name('laporan-realisasi.destroy');


    Route::post('kegiatan', [LaporanRealisasiController::class, 'storeKegiatan'])->name('kegiatan.store');
    Route::put('kegiatan/{id}', [LaporanRealisasiController::class, 'updateKegiatan'])->name('kegiatan.update');
    Route::delete('kegiatan/{id}', [LaporanRealisasiController::class, 'destroyKegiatan'])->name('kegiatan.destroy');
    Route::post('kegiatan-search', [LaporanRealisasiController::class, 'index'])->name('kegiatan-search');

    Route::resource('dpa', DpaController::class);
    Route::resource('laporan-keuangan', LaporanKeuanganController::class);

    // ----------------------------- Bidang Kerawanan Pangan ------------------------------//
    // 
    Route::get('skpg-bulanan', [SkpgController::class, 'indexSkpg'])->name('skpg-bulanan.index');
    Route::post('skpg-bulanan', [SkpgController::class, 'storeSkpg'])->name('skpg-bulanan.store');
    Route::get('skpg-bulanan/{id}', [SkpgController::class, 'showSkpg'])->name('skpg-bulanan.show');
    Route::put('skpg-bulanan/{id}', [SkpgController::class, 'updateSkpg'])->name('skpg-bulanan.update');
    Route::delete('skpg-bulanan/{id}', [SkpgController::class, 'destroySkpg'])->name('skpg-bulanan.destroy');

    Route::post('skpg-peta', [SkpgController::class, 'storePeta'])->name('skpg-peta.store');
    Route::put('skpg-peta/{id}', [SkpgController::class, 'updatePeta'])->name('skpg-peta.update');
    Route::delete('skpg-peta/{id}', [SkpgController::class, 'destroyPeta'])->name('skpg-peta.destroy');

    Route::get('peta-fsva', [FsvaController::class, 'index'])->name('peta-fsva.index');
    Route::post('peta-fsva-store', [FsvaController::class, 'store'])->name('peta-fsva-store');
    Route::put('peta-fsva-update/{id}', [FsvaController::class, 'update'])->name('peta-fsva-update');
    Route::get('peta-fsva/{id}', [FsvaController::class, 'show'])->name('peta-fsva.show');
    Route::delete('peta-fsva-destroy/{id}', [FsvaController::class, 'destroy'])->name('peta-fsva-destroy');

    Route::post('peta-fsva', [FsvaController::class, 'storePeta'])->name('peta-fsva.store');
    Route::put('peta-fsva/{id}', [FsvaController::class, 'updatePeta'])->name('peta-fsva.update');
    Route::delete('peta-fsva/{id}', [FsvaController::class, 'destroyPeta'])->name('peta-fsva.destroy');


    Route::get('skor-pph-ketersediaan', [PPHKetersediaanController::class, 'index'])->name('skor-pph-ketersediaan.index');
    Route::post('skor-pph-ketersediaan', [PPHKetersediaanController::class, 'store'])->name('skor-pph-ketersediaan.store');
    Route::put('skor-pph-ketersediaan/{id}', [PPHKetersediaanController::class, 'update'])->name('skor-pph-ketersediaan.update');
    Route::delete('skor-pph-ketersediaan/{id}', [PPHKetersediaanController::class, 'destroy'])->name('skor-pph-ketersediaan.destroy');
    Route::get('skor-pph-ketersediaan', [PPHKetersediaanController::class, 'search'])->name('skor-pph-ketersediaan.search');

    Route::get('data-prognosa', [DataPrognosaController::class, 'index']);
    Route::post('data-prognosa', [DataPrognosaController::class, 'store'])->name('data-prognosa.store');
    Route::put('data-prognosa/{id}', [DataPrognosaController::class, 'update'])->name('data-prognosa.update');
    Route::delete('data-prognosa/{id}', [DataPrognosaController::class, 'destroy'])->name('data-prognosa.destroy');

    Route::resource('data-kelompok-tani', DktController::class);
    Route::get('data-kelompok-tani-export', [DktController::class, 'export'])->name('data-kelompok-tani-export');
    Route::get('data-kelompok-tani-cari/{id}', [DktController::class, 'cari'])->name('data-kelompok-tani-cari');

    Route::post('data-kelompok-tani-kelurahan', [DktController::class, 'storeKelurahan'])->name('data-kelompok-tani-kelurahan.store');
    Route::get('data-kelompok-tani-kelurahan/{id}', [DktController::class, 'showKelurahan'])->name('data-kelompok-tani-kelurahan.show');
    Route::put('data-kelompok-tani-kelurahan/{id}', [DktController::class, 'updateKelurahan'])->name('data-kelompok-tani-kelurahan.update');
    Route::delete('data-kelompok-tani-kelurahan/{id}', [DktController::class, 'destroyKelurahan'])->name('data-kelompok-tani-kelurahan.destroy');

    Route::post('kelompok-kelurahan', [DktController::class, 'storeKelompok'])->name('kelompok-kelurahan.store');
    Route::get('kelompok-kelurahan/{id}', [DktController::class, 'showKelompok'])->name('kelompok-kelurahan.show');
    Route::put('kelompok-kelurahan/{id}', [DktController::class, 'updateKelompok'])->name('kelompok-kelurahan.update');
    Route::delete('kelompok-kelurahan/{id}', [DktController::class, 'destroyKelompok'])->name('kelompok-kelurahan.destroy');

    Route::post('anggota-kelompok', [DktController::class, 'storeAnggota'])->name('anggota-kelompok.store');
    Route::put('anggota-kelompok/{id}', [DktController::class, 'updateAnggota'])->name('anggota-kelompok.update');
    Route::delete('anggota-kelompok/{id}', [DktController::class, 'destroyAnggota'])->name('anggota-kelompok.destroy');

    Route::get('daftar-kamapan', [KTKamapanController::class, 'indexDaftar']);
    Route::post('daftar-kamapan', [KTKamapanController::class, 'storeDaftar'])->name('daftar-kamapan.store');
    Route::get('daftar-kamapan/{id}', [KTKamapanController::class, 'showDaftar'])->name('daftar-kamapan.show');
    Route::put('daftar-kamapan/{id}', [KTKamapanController::class, 'updateDaftar'])->name('daftar-kamapan.update');
    Route::delete('daftar-kamapan/{id}', [KTKamapanController::class, 'destroyDaftar'])->name('daftar-kamapan.destroy');

    Route::post('daftar-bantuan-kamapan', [KTKamapanController::class, 'storeDaftarBantuan'])->name('daftar-bantuan-kamapan.store');
    Route::put('daftar-bantuan-kamapan/{id}', [KTKamapanController::class, 'updateDaftarBantuan'])->name('daftar-bantuan-kamapan.update');
    Route::delete('daftar-bantuan-kamapan/{id}', [KTKamapanController::class, 'destroyDaftarBantuan'])->name('daftar-bantuan-kamapan.destroy');

    Route::get('proposal-kamapan', [KTKamapanController::class, 'indexProposal']);
    Route::post('proposal-kamapan', [KTKamapanController::class, 'storeProposal'])->name('proposal-kamapan.store');
    Route::put('proposal-kamapan/{id}', [KTKamapanController::class, 'updateProposal'])->name('proposal-kamapan.update');
    Route::delete('proposal-kamapan/{id}', [KTKamapanController::class, 'destroyProposal'])->name('proposal-kamapan.destroy');

    Route::get('spt-cpcl', [KTKamapanController::class, 'indexSptCpcl']);
    Route::post('spt-cpcl', [KTKamapanController::class, 'storeSptCpcl'])->name('spt-cpcl.store');
    Route::put('spt-cpcl/{id}', [KTKamapanController::class, 'updateSptCpcl'])->name('spt-cpcl.update');
    Route::delete('spt-cpcl/{id}', [KTKamapanController::class, 'destroySptCpcl'])->name('spt-cpcl.destroy');

    Route::get('verifikasi-cpcl', [KTKamapanController::class, 'indexVerifikasiCpcl'])->name('verifikasi-cpcl.index');
    Route::post('verifikasi-cpcl', [KTKamapanController::class, 'storeVerifikasiCpcl'])->name('verifikasi-cpcl.store');
    Route::put('verifikasi-cpcl/{id}', [KTKamapanController::class, 'updateVerifikasiCpcl'])->name('verifikasi-cpcl.update');
    Route::get('verifikasi-cpcl/{id}', [KTKamapanController::class, 'exportVerifikasiCpcl'])->name('verifikasi-cpcl.export');
    Route::delete('verifikasi-cpcl/{id}', [KTKamapanController::class, 'destroyVerifikasiCpcl'])->name('verifikasi-cpcl.destroy');

    Route::get('sk-penerima-manfaat', [KTKamapanController::class, 'indexSK']);
    Route::post('sk-penerima-manfaat', [KTKamapanController::class, 'storeSK'])->name('sk-penerima-manfaat.store');
    Route::put('sk-penerima-manfaat/{id}', [KTKamapanController::class, 'updateSK'])->name('sk-penerima-manfaat.update');
    Route::delete('sk-penerima-manfaat/{id}', [KTKamapanController::class, 'destroySK'])->name('sk-penerima-manfaat.destroy');

    Route::get('berita-acara', [KTKamapanController::class, 'indexBA']);
    Route::post('berita-acara-store', [KTKamapanController::class, 'storeBA'])->name('berita-acara-store');
    Route::get('berita-acara/{id}', [KTKamapanController::class, 'printBA'])->name('berita-acara.print');
    Route::get('berita-acara-show/{id}', [KTKamapanController::class, 'showBA'])->name('berita-acara.show');
    Route::put('berita-acara/{id}', [KTKamapanController::class, 'updateBA'])->name('berita-acara.update');
    Route::delete('berita-acara/{id}', [KTKamapanController::class, 'destroyBA'])->name('berita-acara.destroy');
    Route::get('berita-acara-excel', [KTKamapanController::class, 'indexBA'])->name('berita-acara.excel');

    Route::post('berita-acara-show', [KTKamapanController::class, 'storeBAShow'])->name('berita-acara-show.store');
    Route::put('berita-acara-show/{id}', [KTKamapanController::class, 'updateBAShow'])->name('berita-acara-show.update');
    Route::delete('berita-acara-show/{id}', [KTKamapanController::class, 'destroyBAShow'])->name('berita-acara-show.destroy');

    Route::get('monev-kamapan', [KTKamapanController::class, 'indexMonev']);
    Route::get('monev-kamapan/{id}', [KTKamapanController::class, 'excelMonev'])->name('monev-kamapan.excel');

    // Bidang Distribusi Pangan
    Route::resource('unit-distributor', UnitDistributorController::class);
    Route::get('unit-distributor-export', [UnitDistributorController::class, 'export'])->name('unit-distributor-export');

    Route::get('harga-pangan', [HargaPanganController::class, 'index'])->name('harga-pangan.index');
    Route::post('harga-pangan-store', [HargaPanganController::class, 'store'])->name('harga-pangan-store');
    Route::put('harga-pangan/{id}', [HargaPanganController::class, 'update'])->name('harga-pangan.update');
    Route::delete('harga-pangan/{id}', [HargaPanganController::class, 'destroy'])->name('harga-pangan.destroy');
    Route::post('harga-pangan', [HargaPanganController::class, 'index'])->name('harga-pangan-search');

    Route::get('flyer', [FlyerController::class, 'index']);
    Route::post('flyer', [FlyerController::class, 'store'])->name('flyer.store');
    Route::get('flyer/{id}', [FlyerController::class, 'show'])->name('flyer.show');

    Route::resource('pasar', PasarController::class);
    Route::get('pasar-export', [PasarController::class, 'export']);
    Route::get('pasar-excel', [PasarController::class, 'excel']);

    Route::post('pasar-jenis', [PasarController::class, 'storeJenis'])->name('pasar-jenis.store');
    Route::put('pasar-jenis/{id}', [PasarController::class, 'updateJenis'])->name('pasar-jenis.update');
    Route::delete('pasar-jenis/{id}', [PasarController::class, 'destroyJenis'])->name('pasar-jenis.destroy');

    Route::get('daftar-gudang', [DaftarGudangController::class, 'index']);
    Route::post('daftar-gudang', [DaftarGudangController::class, 'store'])->name('daftar-gudang.store');
    Route::put('daftar-gudang/{id}', [DaftarGudangController::class, 'update'])->name('daftar-gudang.update');
    Route::delete('daftar-gudang/{id}', [DaftarGudangController::class, 'destroy'])->name('daftar-gudang.destroy');
    Route::get('daftar-gudang-export', [DaftarGudangController::class, 'export'])->name('daftar-gudang.export');

    Route::get('data-kampung-pangan', [DataKampungPanganController::class, 'index']);
    Route::post('data-kampung-pangan', [DataKampungPanganController::class, 'store'])->name('data-kampung-pangan.store');
    Route::get('data-kampung-pangan/{id}', [DataKampungPanganController::class, 'show'])->name('data-kampung-pangan.show');
    Route::put('data-kampung-pangan/{id}', [DataKampungPanganController::class, 'update'])->name('data-kampung-pangan.update');
    Route::delete('data-kampung-pangan/{id}', [DataKampungPanganController::class, 'destroy'])->name('data-kampung-pangan.destroy');
    Route::get('data-kampung-pangan-export', [DataKampungPanganController::class, 'export'])->name('data-kampung-pangan.export');

    // Bidang Cadangan Pangan
    Route::resource('data-cadangan-pangan', CadanganPanganController::class);

    Route::post('data-cadangan-stok', [CadanganPanganController::class, 'storeStok'])->name('data-cadangan-stok.store');
    Route::put('data-cadangan-stok/{id}', [CadanganPanganController::class, 'updateStok'])->name('data-cadangan-stok.update');
    Route::delete('data-cadangan-stok/{id}', [CadanganPanganController::class, 'destroyStok'])->name('data-cadangan-stok.destroy');
    Route::post('data-cadangan-stok-excel', [CadanganPanganController::class, 'excel'])->name('data-cadangan-stok-excel');

    Route::resource('cadangan-bulog', CadanganBulogController::class);

    // Bidang Keamanan Pangan
    Route::resource('data-keamanan-pangan-segar', KeamananPanganController::class);

    Route::post('sampel-pangan-segar', [KeamananPanganController::class, 'storeSampel'])->name('sampel-pangan-segar');
    Route::put('sampel-pangan-segar/{id}', [KeamananPanganController::class, 'updateSampel'])->name('sampel-pangan-segar-update');
    Route::delete('sampel-pangan-segar/{id}', [KeamananPanganController::class, 'destroySampel'])->name('sampel-pangan-segar-destroy');
    Route::post('sampel-pangan-segar-excel', [KeamananPanganController::class, 'index'])->name('sampel-pangan-segar-excel');

    Route::resource('pengusul-sertifikasi', PengusulSertifikasiController::class);

    Route::get('data-pangan-lokal', [DataPanganLokalController::class, 'index']);
    Route::post('data-pangan-lokal', [DataPanganLokalController::class, 'store'])->name('data-pangan-lokal-store');
    Route::put('data-pangan-lokal/{id}', [DataPanganLokalController::class, 'update'])->name('data-pangan-lokal-update');
    Route::delete('data-pangan-lokal/{id}', [DataPanganLokalController::class, 'destroy'])->name('data-pangan-lokal-destroy');
    Route::get('data-pangan-lokal-export', [DataPanganLokalController::class, 'export'])->name('data-pangan-lokal-export');

    Route::get('data-konsumsi-pangan', [KonsumsiPanganController::class, 'index']);
    Route::post('data-konsumsi-pangan', [KonsumsiPanganController::class, 'store'])->name('data-konsumsi-pangan');
    Route::put('data-konsumsi-pangan/{id}', [KonsumsiPanganController::class, 'update'])->name('data-konsumsi-pangan-update');
    Route::delete('data-konsumsi-pangan/{id}', [KonsumsiPanganController::class, 'destroy'])->name('data-konsumsi-pangan-destroy');
    Route::get('data-konsumsi-pangan-excel', [KonsumsiPanganController::class, 'excel'])->name('data-konsumsi-pangan-excel');

    // Bidang Konsumsi
    Route::resource('kelompok-wanita-tani', KelompokWanitaTaniController::class);

    Route::get('kelompok-wanita-tani-search/{id}', [KelompokWanitaTaniController::class, 'searchKwt'])->name('kelompok-wanita-tani-search');

    Route::post('kelompok-wanita-tani-kelurahan', [KelompokWanitaTaniController::class, 'storeKelurahan'])->name('kelompok-wanita-tani-kelurahan.store');
    Route::get('kelompok-wanita-tani-kelurahan/{id}', [KelompokWanitaTaniController::class, 'showKelurahan'])->name('kelompok-wanita-tani-kelurahan.show');
    Route::put('kelompok-wanita-tani-kelurahan/{id}', [KelompokWanitaTaniController::class, 'updateKelurahan'])->name('kelompok-wanita-tani-kelurahan.update');
    Route::delete('kelompok-wanita-tani-kelurahan/{id}', [KelompokWanitaTaniController::class, 'destroyKelurahan'])->name('kelompok-wanita-tani-kelurahan.destroy');

    Route::post('kelompok-wanita-tani-kelompok', [KelompokWanitaTaniController::class, 'storeKelompok'])->name('kelompok-wanita-tani-kelompok.store');
    Route::get('kelompok-wanita-tani-kelompok/{id}', [KelompokWanitaTaniController::class, 'showKelompok'])->name('kelompok-wanita-tani-kelompok.show');
    Route::put('kelompok-wanita-tani-kelompok/{id}', [KelompokWanitaTaniController::class, 'updateKelompok'])->name('kelompok-wanita-tani-kelompok.update');
    Route::delete('kelompok-wanita-tani-kelompok/{id}', [KelompokWanitaTaniController::class, 'destroyKelompok'])->name('kelompok-wanita-tani-kelompok.destroy');

    Route::post('kelompok-wanita-tani-anggota', [KelompokWanitaTaniController::class, 'storeAnggota'])->name('kelompok-wanita-tani-anggota.store');
    Route::put('kelompok-wanita-tani-anggota/{id}', [KelompokWanitaTaniController::class, 'updateAnggota'])->name('kelompok-wanita-tani-anggota.update');
    Route::delete('kelompok-wanita-tani-anggota/{id}', [KelompokWanitaTaniController::class, 'destroyAnggota'])->name('kelompok-wanita-tani-anggota.destroy');

    Route::get('komoditi-kelompok-wanita-tani/{id}', [KelompokWanitaTaniController::class, 'indexKomoditi'])->name('komoditi-kelompok-wanita-tani');
    Route::post('komoditi-kelompok-wanita-tani', [KelompokWanitaTaniController::class, 'storeKomoditi'])->name('komoditi-kelompok-wanita-tani.store');
    Route::put('komoditi-kelompok-wanita-tani/{id}', [KelompokWanitaTaniController::class, 'updateKomoditi'])->name('komoditi-kelompok-wanita-tani.update');
    Route::delete('komoditi-kelompok-wanita-tani/{id}', [KelompokWanitaTaniController::class, 'destroyKomoditi'])->name('komoditi-kelompok-wanita-tani.destroy');

    Route::get('kwt-export', [KelompokWanitaTaniController::class, 'export']);

    Route::get('penerima-manfaat-kwt', [BantuanKWTController::class, 'indexDaftarPenerima']);
    Route::post('penerima-manfaat-kwt', [BantuanKWTController::class, 'storeDaftarPenerima'])->name('penerima-manfaat-kwt.store');
    Route::put('penerima-manfaat-kwt/{id}', [BantuanKWTController::class, 'updateDaftarPenerima'])->name('penerima-manfaat-kwt.update');
    Route::delete('penerima-manfaat-kwt/{id}', [BantuanKWTController::class, 'destroyDaftarPenerima'])->name('penerima-manfaat-kwt.destroy');
    Route::get('penerima-manfaat-kwt/{id}', [BantuanKWTController::class, 'showDaftarPenerima'])->name('penerima-manfaat-kwt.show');
    Route::post('penerima-manfaat-kwt-bantuan', [BantuanKWTController::class, 'storeDaftarPenerimaBantuan'])->name('penerima-manfaat-kwt-bantuan.store');
    Route::put('penerima-manfaat-kwt-bantuan/{id}', [BantuanKWTController::class, 'updateDaftarPenerimaBantuan'])->name('penerima-manfaat-kwt-bantuan.update');
    Route::delete('penerima-manfaat-kwt-bantuan/{id}', [BantuanKWTController::class, 'destroyDaftarPenerimaBantuan'])->name('penerima-manfaat-kwt-bantuan.destroy');

    Route::get('kwt-proposal', [BantuanKWTController::class, 'indexProposal']);
    Route::post('kwt-proposal', [BantuanKWTController::class, 'storeProposal'])->name('kwt-proposal.store');
    Route::put('kwt-proposal/{id}', [BantuanKWTController::class, 'updateProposal'])->name('kwt-proposal.update');
    Route::delete('kwt-proposal/{id}', [BantuanKWTController::class, 'destroyProposal'])->name('kwt-proposal.destroy');

    Route::get('kwt-spt', [BantuanKWTController::class, 'indexSPT']);
    Route::post('kwt-spt', [BantuanKWTController::class, 'storeSPT'])->name('kwt-spt.store');
    Route::put('kwt-spt/{id}', [BantuanKWTController::class, 'updateSPT'])->name('kwt-spt.update');
    Route::delete('kwt-spt/{id}', [BantuanKWTController::class, 'destroySPT'])->name('kwt-spt.destroy');

    Route::get('kwt-verifikasi-cpcl', [BantuanKWTController::class, 'indexVerifikasi']);
    Route::post('kwt-verifikasi-cpcl', [BantuanKWTController::class, 'storeVerifikasi'])->name('kwt-verifikasi-cpcl.store');
    Route::put('kwt-verifikasi-cpcl/{id}', [BantuanKWTController::class, 'updateVerifikasi'])->name('kwt-verifikasi-cpcl.update');
    Route::delete('kwt-verifikasi-cpcl/{id}', [BantuanKWTController::class, 'destroyVerifikasi'])->name('kwt-verifikasi-cpcl.destroy');
    Route::get('kwt-verifikasi-cpcl/{id}', [BantuanKWTController::class, 'pdfVerifikasi'])->name('kwt-verifikasi-cpcl.pdf');

    Route::get('kwt-sk', [BantuanKWTController::class, 'indexSk']);
    Route::post('kwt-sk', [BantuanKWTController::class, 'storeSk'])->name('kwt-sk.store');
    Route::put('kwt-sk/{id}', [BantuanKWTController::class, 'updateSk'])->name('kwt-sk.update');
    Route::delete('kwt-sk/{id}', [BantuanKWTController::class, 'destroySk'])->name('kwt-sk.destroy');

    Route::get('kwt-berita-acara', [BantuanKWTController::class, 'indexBerita']);
    Route::post('kwt-berita-acara', [BantuanKWTController::class, 'storeBerita'])->name('kwt-berita-acara.store');
    Route::get('kwt-berita-acara/{id}', [BantuanKWTController::class, 'showBerita'])->name('kwt-berita-acara.show');
    Route::get('kwt-berita-acara-pdf/{id}', [BantuanKWTController::class, 'pdfBerita'])->name('kwt-berita-acara.pdf');
    Route::put('kwt-berita-acara/{id}', [BantuanKWTController::class, 'updateBerita'])->name('kwt-berita-acara.update');
    Route::delete('kwt-berita-acara/{id}', [BantuanKWTController::class, 'destroyBerita'])->name('kwt-berita-acara.destroy');

    Route::post('kwt-berita-acara-bantuan', [BantuanKWTController::class, 'storeBeritaBantuan'])->name('kwt-berita-acara-bantuan.store');
    Route::put('kwt-berita-acara-bantuan/{id}', [BantuanKWTController::class, 'updateBeritaBantuan'])->name('kwt-berita-acara-bantuan.update');
    Route::delete('kwt-berita-acara-bantuan/{id}', [BantuanKWTController::class, 'destroyBeritaBantuan'])->name('kwt-berita-acara-bantuan.destroy');

    Route::get('kwt-monev', [BantuanKWTController::class, 'indexMonev']);
    Route::get('kwt-monev/{id}', [BantuanKWTController::class, 'excelMonev'])->name('kwt-monev.excel');
});