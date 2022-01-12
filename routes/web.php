<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

//SISWA
use App\Http\Controllers\siswa\DashboardSiswaController;
use App\Http\Controllers\siswa\BiodatadirisiswaController;
use App\Http\Controllers\siswa\DataTambahanSiswaController;
use App\Http\Controllers\siswa\DataOrtuSiswaController;
use App\Http\Controllers\siswa\DataBerkasSiswaController;

//ADMIN
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\GenerateSiswaController;
use App\Http\Controllers\admin\BiodatadiriAdminController;

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

// Route::group(['prefix' => 'siswa/'], function(){
//     Route::get('/', [DashboardSiswaController::Class, 'index'])->name('dashboard-siswa');
//     Route::group(['prefix'  => 'biodata-diri'],function(){
//         Route::get('/', [BiodatadiriSiswaController::Class, 'index'])->name('biodata-diri');
//         Route::get('{nisn}/edit', [BiodatadiriSiswaController::Class, 'edit'])->name('biodataEdit');
//         Route::post('{nisn}/update', [BiodatadiriSiswaController::Class, 'update'])->name('biodataStore');    
//     });
// });

//SISWA
Route::group([
    'middleware' => 'cek_login',
    'prefix' => 'siswa/'], function(){
    Route::get('/', [DashboardSiswaController::Class, 'index'])->name('dashboard-siswa');

    Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriSiswaController::Class, 'index'])->name('biodata-diri');
        Route::get('/{nisn}/edit', [BiodatadiriSiswaController::Class, 'edit'])->name('biodataEdit');
        Route::patch('/{nisn}/update', [BiodatadiriSiswaController::Class, 'update'])->name('biodataStore');    
    });

    Route::group(['prefix'  => 'data-tambahan/'],function(){
        Route::patch('/{nisn}/update', [DataTambahanSiswaController::class, 'update'])->name('datatambahan.update');
    });

    Route::group(['prefix'  => 'data-ortu/'],function(){
        Route::get('/{nisn}/edit', [DataOrtuSiswaController::Class, 'edit'])->name('data-ortu.edit');
        Route::patch('/{nisn}/update', [DataOrtuSiswaController::Class, 'update'])->name('data-ortu.update');    
    });

    Route::group(['prefix'  => 'data-berkas/'],function(){
        Route::get('/{nisn}/edit', [DataBerkasSiswaController::Class, 'edit'])->name('data-berkas.edit');
        Route::patch('/{nisn}/update', [DataBerkasSiswaController::Class, 'update'])->name('data-berkas.update');    
    });

});

//Admin


Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardAdminController::Class, 'index'] )->name('dashboard-admin');
    Route::resource('generate-akun', GenerateSiswaController::class);

    Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriAdminController::Class, 'index'])->name('admin.biodata-diri.index');
        Route::get('{nisn}', [BiodatadiriAdminController::Class, 'show'])->name('admin.biodata-diri.show');
        Route::get('{nisn}/edit', [BiodatadiriAdminController::Class, 'edit'])->name('admin.biodata-diri.edit');
        Route::patch('{nisn}/update', [BiodatadiriAdminController::Class, 'update'])->name('admin.biodata-diri.update');
        Route::delete('{id}/destroy',[BiodatadiriAdminController::class, 'destroy'])->name('admin.biodata-diri.destroy');
        
        //verifikasi data biodata diri
        Route::patch('/verifikasiBiodata/{nisn}', [BiodatadiriAdminController::Class, 'verifikasi'])->name('admin.biodata-diri.verifikasi');
    });

   

});



//admin
Route::prefix('admin')->group(function() {
  
});


//Login
Route::get('/login', [LoginController::Class, 'index'] )->name('login');
Route::post('/login', [LoginController::Class, 'authenticate'] )->name('proses_login');
Route::post('/logout', [LoginController::Class, 'logout']);



//uji coba setry
// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });