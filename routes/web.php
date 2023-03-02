<?php

use App\Http\Controllers\Backend\AdminSekolahController;
use App\Http\Controllers\Backend\AdminSekolahShowController;
use App\Http\Controllers\Backend\PenghasilanController;
use App\Http\Controllers\Backend\SekolahAdminController;
use App\Http\Controllers\Backend\SekolahController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardDinasController;
use App\Http\Controllers\DashboardSiswaController;
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


Route::controller(PenghasilanController::class)->middleware('auth')->group(function () {
    Route::get('/penghasilan', 'index')->name('penghasilan.index');
    Route::post('/penghasilan/store', 'store')->name('penghasilan.store');
    Route::post('/penghasilan/edit', 'edit')->name('penghasilan.edit');
    Route::post('/penghasilan/update', 'update')->name('penghasilan.update');
    Route::post('/penghasilan/hapus', 'hapus')->name('penghasilan.hapus');
});


Route::prefix('dinas')->middleware(['auth', 'dinas'])->group(function () {
    //ini route khusus untuk dinas pendidikan
    Route::get('dashboard', [DashboardDinasController::class, 'index'])->name('dashboard_dinas');
    Route::resource('user', UserController::class);
    Route::resource('user-sekolah', AdminSekolahController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::post('sekolahadmin', AdminSekolahShowController::class)->name('sekolahadmin.store');
});



Route::prefix('siswa')->middleware(['auth', 'siswa'])->group(function () {
    //ini route khusus untuk siswa
    Route::get('dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard_siswa');
});

Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
