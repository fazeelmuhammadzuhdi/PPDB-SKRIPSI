<?php

use App\Http\Controllers\Backend\AdminSekolahController;
use App\Http\Controllers\Backend\AdminSekolahShowController;
use App\Http\Controllers\Backend\AfirmasiController;
use App\Http\Controllers\Backend\DataPendaftaranAfirmasi;
use App\Http\Controllers\Backend\DataPendaftaranPindahTugas;
use App\Http\Controllers\Backend\DataPendaftaranPrestasi;
use App\Http\Controllers\Backend\DataPendaftaranZonasi;
use App\Http\Controllers\Backend\DataZonasiSekolahController;
use App\Http\Controllers\Backend\DinasLaporanController;
use App\Http\Controllers\Backend\KampungController;
use App\Http\Controllers\Backend\KecamatanController;
use App\Http\Controllers\Backend\KelulusanController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\NagariController;
use App\Http\Controllers\Backend\PekerjaanController;
use App\Http\Controllers\Backend\PenghasilanController;
use App\Http\Controllers\Backend\PindahTugasOrangTuaController;
use App\Http\Controllers\Backend\PrestasiController;
use App\Http\Controllers\Backend\SekolahController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SettingPpdbController;
use App\Http\Controllers\Backend\SiswaController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserSiswaController;
use App\Http\Controllers\Backend\ZonasiController;
use App\Http\Controllers\Backend\ZonasiSekolahController;
use App\Http\Controllers\DashboardDinasController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/informasi-pendaftaran', [FrontendController::class, 'informasiPendafaran'])->name('informasiPendafaran');
Route::get('/jadwal-pendaftaran', [FrontendController::class, 'jadwalPendafaran'])->name('jadwalPendafaran');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('profile/{id}', [ProfileController::class, 'edit'])->name('profile.dinas');

Route::get('profile', [UserController::class, 'profile'])->name('profile');


Route::prefix('dinas')->middleware(['auth', 'dinas'])->group(function () {
    // Route::prefix('dinas')->middleware(['auth'])->group(function () {
    //ini route khusus untuk dinas pendidikan dan admin sekolah
    Route::get('dashboard', [DashboardDinasController::class, 'index'])->name('dashboard_dinas');
    Route::get('cpd', [UserController::class, 'dataCPD'])->name('dataCPD');
    Route::resource('user', UserController::class);
    Route::resource('user-sekolah', AdminSekolahController::class);

    // Route Data Pendaftaran Prestasi
    Route::get('siswalulus', [DataPendaftaranPrestasi::class, 'siswaLulusJalurPrestasi'])->middleware(['auth', 'sekolah'])->name('siswaLulusJalurPrestasi');
    Route::get('statusprestasi/{id}', [DataPendaftaranPrestasi::class, 'updateStatusDitolakPrestasi'])->middleware(['auth', 'sekolah'])->name('updateStatusDitolakPrestasi');
    Route::resource('data_pendaftaran_prestasi', DataPendaftaranPrestasi::class)->middleware(['auth', 'sekolah']);

    //Route Data Pendaftaran Afirmasi
    Route::get('statusafirmasi/{id}', [DataPendaftaranAfirmasi::class, 'updateStatusDitolakAfirmasi'])->middleware(['auth', 'sekolah'])->name('updateStatusDitolakAfirmasi');
    Route::resource('data_pendaftaran_afirmasi', DataPendaftaranAfirmasi::class)->middleware(['auth', 'sekolah']);

    //Route Data Pendaftaran Pindah Tugas
    Route::get('statuspindahtugas/{id}', [DataPendaftaranPindahTugas::class, 'updateStatusDitolakPindahtugas'])->middleware(['auth', 'sekolah'])->name('updateStatusDitolakPindahtugas');
    Route::resource('data_pendaftaran_pindah_tugas', DataPendaftaranPindahTugas::class)->middleware(['auth', 'sekolah']);

    //Route Data Pendaftaran Zonasi
    Route::post('status/gagal', [DataPendaftaranZonasi::class, 'updateStatusDitolak'])->middleware(['auth', 'sekolah'])->name('updateStatusDitolak');
    Route::resource('data_pendaftaran_zonasi', DataPendaftaranZonasi::class)->middleware(['auth', 'sekolah']);

    Route::resource('user_siswa', UserSiswaController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::post('sekolahadmin', AdminSekolahShowController::class)->name('sekolahadmin.store');
    Route::post('/getkecamatan', [KampungController::class, 'getkecamatan'])->name('getkecamatan');
    Route::resource('kampung', KampungController::class);
    Route::post('/getnagari', [ZonasiSekolahController::class, 'getnagari'])->name('getnagarizonasi');
    Route::post('/getkampung', [ZonasiSekolahController::class, 'getkampung'])->name('getkampungzonasi');
    Route::resource('zonasisekolah', ZonasiSekolahController::class)->middleware(['auth', 'sekolah']);
    Route::resource('setting', SettingController::class);
    Route::resource('settingppdb', SettingPpdbController::class);
    Route::post('/getdatazonasinagari', [DataZonasiSekolahController::class, 'getDataNagariZonasiSekolah'])->name('getdatazonasinagarisekolah');
    Route::post('/getdatazonasikampung', [DataZonasiSekolahController::class, 'getDataKampungZonasiSekolah'])->name('getdatazonasikampungsekolah');
    Route::resource('data_zonasi_sekolah', DataZonasiSekolahController::class);

    //Laporan Di Halaman Dashboard Dinas

    Route::controller(DinasLaporanController::class)->middleware('auth', 'dinas')->name('laporan.')->group(function () {
        Route::get('/laporan-user-admin-sekolah', 'laporanUserAdminDanSekolah')->name('userAdminDanSekolah');
        Route::get('/laporan-user-siswa', 'laporanUserSiswa')->name('userSiswa');
        Route::get('/laporan-sekolah', 'laporanDataSekolah')->name('dataSekolah');
        Route::get('/laporan-kecamatan', 'laporanKecamatan')->name('kecamatan');
        Route::get('/laporan-nagari', 'laporanNagari')->name('nagari');
        Route::get('/laporan-kampung', 'laporanKampung')->name('kampung');
        Route::get('/laporan-kecamatan-nagari-kampung', 'laporanKecamatanNagariKampung')->name('kecamatanNagariKampung');
    });

    //penghasilan
    Route::controller(PenghasilanController::class)->name('penghasilan.')->group(function () {
        Route::get('/penghasilan', 'index')->name('index');
        Route::post('/penghasilan/store', 'store')->name('store');
        Route::get('fetchPenghasilan', 'fetchPenghasilan')->name('fetch');
        Route::get('penghasilan/edit', 'edit')->name('edit');
        Route::post('penghasilan/edit', 'update')->name('update');
        Route::post('penghasilan/destroy', 'destroy')->name('destroy');
        Route::post('penghasilan/destroy/selected', 'destroySelected')->name('destroySelected');
    });

    Route::controller(PekerjaanController::class)->middleware('auth', 'dinas')->name('pekerjaan.')->group(function () {
        Route::get('/pekerjaan', 'index')->name('index');
        Route::post('/pekerjaan/store', 'store')->name('store');
        Route::get('fetchPekerjaan', 'fetchPekerjaan')->name('fetch');
        Route::get('pekerjaan/edit', 'edit')->name('edit');
        Route::post('pekerjaan/edit', 'update')->name('update');
        Route::post('pekerjaan/destroy', 'destroy')->name('destroy');
        Route::post('pekerjaan/destroy/selected', 'destroySelected')->name('destroySelected');
    });

    Route::controller(KecamatanController::class)->middleware('auth', 'dinas')->name('kecamatan.')->group(function () {
        Route::get('/kecamatan', 'index')->name('index');
        Route::post('/kecamatan/store', 'store')->name('store');
        Route::get('/kecamatan/edit/{id}', 'edit')->name('edit');
        Route::put('/kecamatan/update/{id}', 'update')->name('update');
        Route::delete('/kecamatan/hapus/{id}', 'destroy')->name('hapus');
    });

    Route::controller(NagariController::class)->middleware('auth', 'dinas')->name('nagari.')->group(function () {
        Route::get('/nagari', 'index')->name('index');
        Route::get('/nagari/add', 'add')->name('add');
        Route::post('/nagari/store', 'store')->name('store');
        Route::get('/nagari/detail/{id}', 'detail')->name('detail');
        Route::get('/nagari/edit/{id}', 'edit')->name('edit');
        Route::put('/nagari/update/{id}', 'update')->name('update');
        Route::delete('/nagari/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(LaporanController::class)->middleware('auth', 'sekolah')->group(function () {
        Route::get('/lulus', 'lulus')->name('lulus');
        Route::get('/export', 'cetakPdfSiswaLulus')->name('cetakpdf');
        Route::get('/ditolak', 'ditolak')->name('ditolak');
        Route::get('/export/ditolak', 'cetakPdfSiswaDitolak')->name('cetakPdfSiswaDitolak');
        Route::get('/exportexcel', 'exportExcelSiswaLulus')->name('exportExcelSiswaLulus');
        Route::get('/afirmasi/lulus', 'exportExcelAfirmasiSiswaLulus')->name('exportExcelAfirmasiSiswaLulus');
        Route::get('/afirmasi/belumlulus', 'exportExcelAfirmasiSiswaBelumLulus')->name('exportExcelAfirmasiSiswaBelumLulus');
        Route::get('/pindahtugas/lulus', 'exportExcelPindahTugasSiswaLulus')->name('exportExcelPindahTugasSiswaLulus');
        Route::get('/pindahtugas/belumlulus', 'exportExcelPindahTugasSiswaBelumLulus')->name('exportExcelPindahTugasSiswaBelumLulus');
        Route::get('/prestasi/lulus', 'exportExcelPrestasiSiswaLulus')->name('exportExcelPrestasiSiswaLulus');
        Route::get('/prestasi/belumlulus', 'exportExcelPrestasiSiswaBelumLulus')->name('exportExcelPrestasiSiswaBelumLulus');
        Route::get('/zonasi/lulus', 'exportExcelZonasiSiswaLulus')->name('exportExcelZonasiSiswaLulus');
        Route::get('/zonasi/belumlulus', 'exportExcelZonasiSiswaBelumLulus')->name('exportExcelZonasiSiswaBelumLulus');
        Route::get('/pendaftar', 'siswaPendaftar')->name('siswaPendaftar');
        Route::get('/data-pendaftaran', 'cetakPdfDataPendaftar')->name('cetakPdfDataPendaftar');
        Route::get('/create-laporan', 'createLaporan')->name('createLaporan');
        Route::get('/filter-laporan', 'filterLaporan')->name('filterLaporan');
        Route::get('/filter-laporan-pertahun', 'filterLaporanPerTahun')->name('filterLaporanPertahun');
    });

    Route::controller(KelulusanController::class)->name('kelulusan.')->group(function () {
        Route::get('/kelulusan', 'index')->name('index');
        Route::post('/kelulusan', 'kelulusan')->name('sekolah');
    });
});



Route::prefix('siswa')->middleware(['auth', 'siswa'])->group(function () {
    //ini route khusus untuk siswa
    Route::get('dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard_siswa');
    Route::get('jalur_pendaftaran', [DashboardSiswaController::class, 'jalurPendaftaran'])->name('jalur_pendaftaran');
    Route::get('kartupendaftaran', [DashboardSiswaController::class, 'kartuPendaftaran'])->name('kartu_pendaftaran');
    Route::get('cek', [DashboardSiswaController::class, 'cek'])->name('cek');
    Route::get('cek/hasil', [DashboardSiswaController::class, 'cari'])->name('cek_hasil_kelulusan');
    Route::post('/getnagari', [SiswaController::class, 'getnagari'])->name('getnagarizonasiswa');
    Route::post('/getkampung', [SiswaController::class, 'getkampung'])->name('getkampungzonasiswa');
    Route::resource('siswa', SiswaController::class);
    Route::resource('usersiswa', UserSiswaController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('afirmasi', AfirmasiController::class);
    Route::resource('pindahtugas', PindahTugasOrangTuaController::class);
    Route::resource('zonasi', ZonasiController::class);
});

Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
