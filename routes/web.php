<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Rute login dan logout
Route::controller(LoginController::class)->group(function () {
    Route::get('/view-login', 'viewLogin')->name('view-login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});

// Akses untuk level staff, admin, komandan, wadan
Route::group(['middleware' => ['auth', 'cekLevel:admin,komandan,wadan,staff,superadmin']], function () {
    // Menu utama
    Route::get('/main', [SuratController::class, 'main']);
    Route::get('/surat', [SuratController::class, 'index']);
    // Surat Masuk
    Route::get('/view-sm', [SuratMasukController::class, 'viewSm']);
    // Surat Keluar
    Route::get('/view-sk', [SuratKeluarController::class, 'viewSk']);
    // Jenis Surat
    Route::get('/view-jenis', [JenisSuratController::class, 'viewJenis']);
});

Route::group(['middleware' => ['auth', 'cekLevel:admin,komandan,wadan,staff,superadmin']], function () {
    Route::get('/view-user', [LoginController::class, 'viewUser']);
    Route::get('/input-user', [LoginController::class, 'inputUser']);
    Route::post('/save-user', [LoginController::class, 'saveUser']);
    Route::get('/edit-user/{id}', [LoginController::class, 'editUser']);
    Route::get('/hapus-user/{id}', [LoginController::class, 'hapusUser']);
    Route::post('/update-user/{id}', [LoginController::class, 'updateUser']);

    // Surat masuk
    Route::get('/input-sm', [SuratMasukController::class, 'inputSm']);
    Route::post('/save-sm', [SuratMasukController::class, 'saveSm']);
    Route::get('/edit-sm/{id}', [SuratMasukController::class, 'editSm']);
    Route::post('/update-sm/{id}', [SuratMasukController::class, 'updateSm']);
    Route::get('/hapus-sm/{id}', [SuratMasukController::class, 'hapusSm']);

    // Surat keluar
    Route::get('/input-sk', [SuratKeluarController::class, 'inputSk']);
    Route::post('/save-sk', [SuratKeluarController::class, 'saveSk']);
    Route::get('/edit-sk/{id}', [SuratKeluarController::class, 'editSk']);
    Route::post('/update-sk/{id}', [SuratKeluarController::class, 'updateSk']);
    Route::get('/hapus-sk/{id}', [SuratKeluarController::class, 'hapusSk']);

    // Jenis surat
    Route::get('/input-jenis', [JenisSuratController::class, 'inputJenis']);
    Route::post('/save-jenis', [JenisSuratController::class, 'saveJenis']);
    Route::get('/edit-jenis/{id}', [JenisSuratController::class, 'editJenis']);
    Route::post('/update-jenis/{id}', [JenisSuratController::class, 'updateJenis']);
    Route::get('/hapus-jenis/{id}', [JenisSuratController::class, 'hapusJenis']);
});

// Akses untuk level superadmin
Route::group(['middleware' => ['auth', 'cekLevel:superadmin']], function () {
    Route::get('/dashboard', [SuratController::class, 'index']);
});

