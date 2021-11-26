<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

//SISWA
use App\Http\Controllers\siswa\DashboardSiswaController;
use App\Http\Controllers\siswa\BiodatadirisiswaController;
use App\Http\Controllers\siswa\DataTambahanSiswaController;

//ADMIN
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\GenerateSiswaController;

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
    return view('homepage.layout_homepage.layout');
});

// siswa
// Route::prefix('siswa')->namespace('')->group(function(){
//     Route::get('/', [DashboardSiswaController::Class, 'index'])->name('dashboard-siswa');
//     Route::get('biodata-diri', [BiodatadiriSiswaController::Class, 'index'])->name('select-form');
//     Route::post('biodata-diri/create', [BiodatadiriSiswaController::Class, 'create'])->name('form-biodata'); 
// });

Route::group(['middleware' => 'cek_login'] , function(){
    Route::get('/siswa', [DashboardSiswaController::Class, 'index'])->name('dashboard-siswa');
    Route::get('/siswa/biodata-diri', [BiodatadiriSiswaController::Class, 'index'])->name('biodata-diri');
    Route::get('/siswa/biodata-diri/{nisn}/edit', [BiodatadiriSiswaController::Class, 'edit'])->name('biodataEdit');
    Route::post('/siswa/biodata-diri/{nisn}', [BiodatadiriSiswaController::Class, 'update'])->name('biodataStore');
});

Route::prefix('siswa')->group(function() {
    // Route::get('/', [DashboardAdminController::Class, 'index'] )->name('dashboard-admin');
    Route::resource('data-tambahan', DataTambahanSiswaController::class);
});



//admin
Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardAdminController::Class, 'index'] )->name('dashboard-admin');
    Route::resource('generate-akun', GenerateSiswaController::class);
});


//Login
Route::get('/login', [LoginController::Class, 'index'] )->name('login');
Route::post('/login', [LoginController::Class, 'authenticate'] )->name('proses_login');
Route::post('/logout', [LoginController::Class, 'logout']);



//uji coba setry
// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });