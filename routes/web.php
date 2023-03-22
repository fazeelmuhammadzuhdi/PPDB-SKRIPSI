<?php

use App\Http\Controllers\Backend\AdminSekolahController;
use App\Http\Controllers\Backend\AdminSekolahShowController;
use App\Http\Controllers\Backend\DataPendaftaran;
use App\Http\Controllers\Backend\DataPendaftaranPrestasi;
use App\Http\Controllers\Backend\PekerjaanController;
use App\Http\Controllers\Backend\PenghasilanController;
use App\Http\Controllers\Backend\PrestasiController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SekolahController;
use App\Http\Controllers\Backend\SiswaController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserSiswaController;
use App\Http\Controllers\DashboardDinasController;
use App\Http\Controllers\DashboardSiswaController;
use App\Models\Prestasi;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('profile/{id}', [ProfileController::class, 'edit'])->name('profile.dinas');

Route::get('profile', [UserController::class, 'profile'])->name('profile');


Route::prefix('dinas')->middleware(['auth', 'dinas'])->group(function () {
    //ini route khusus untuk dinas pendidikan
    Route::get('dashboard', [DashboardDinasController::class, 'index'])->name('dashboard_dinas');
    Route::resource('user', UserController::class);
    Route::resource('user-sekolah', AdminSekolahController::class);
    Route::get('status/{id}/gagal', [DataPendaftaranPrestasi::class, 'updateStatusDitolak'])->name('updateStatusDitolak');
    Route::resource('data_pendaftaran_prestasi', DataPendaftaranPrestasi::class);
    Route::resource('user_siswa', UserSiswaController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::post('sekolahadmin', AdminSekolahShowController::class)->name('sekolahadmin.store');
    Route::controller(PenghasilanController::class)->group(function () {
        Route::get('/penghasilan', 'index')->name('penghasilan.index');
        Route::post('/penghasilan/store', 'store')->name('penghasilan.store');
        Route::post('/penghasilan/edit', 'edit')->name('penghasilan.edit');
        Route::post('/penghasilan/update', 'update')->name('penghasilan.update');
        Route::post('/penghasilan/hapus', 'destroy')->name('penghasilan.hapus');
    });
    Route::controller(PekerjaanController::class)->middleware('auth', 'dinas')->group(function () {
        Route::get('/pekerjaan', 'index')->name('pekerjaan.index');
        Route::post('/pekerjaan/store', 'store')->name('pekerjaan.store');
        Route::post('/pekerjaan/edit', 'edit')->name('pekerjaan.edit');
        Route::post('/pekerjaan/update', 'update')->name('pekerjaan.update');
        Route::post('/pekerjaan/hapus', 'destroy')->name('pekerjaan.hapus');
    });
});



Route::prefix('siswa')->middleware(['auth', 'siswa'])->group(function () {
    //ini route khusus untuk siswa
    Route::get('dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard_siswa');
    Route::get('jalur_pendaftaran', [DashboardSiswaController::class, 'jalurPendaftaran'])->name('jalur_pendaftaran');
    Route::resource('siswa', SiswaController::class);
    Route::resource('usersiswa', UserSiswaController::class);

    Route::resource('prestasi', PrestasiController::class);
});

Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
