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
use App\Http\Controllers\admin\DataOrtuAdminController;

//Pengaturan
use App\Http\Controllers\Admin\pengaturan\DataAdminTransportasiController;
use App\Http\Controllers\Admin\pengaturan\DataAdminAgamaController;
use App\Http\Controllers\Admin\pengaturan\DataAdminJenisTinggalController;
use App\Http\Controllers\Admin\pengaturan\DataAdminPekerjaanController;
use App\Http\Controllers\Admin\pengaturan\DataAdminPendidikanController;
use App\Http\Controllers\Admin\pengaturan\DataAdminPenghasilanController;

//Homepage
use App\Http\Controllers\Homepage\HomepageController;
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


    Route::get('/', [HomepageController::Class, 'index'])->name('homepage');


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
        Route::get('{nisn}/edit', [BiodatadiriSiswaController::Class, 'edit'])->name('biodataEdit');
        Route::patch('{nisn}/update', [BiodatadiriSiswaController::Class, 'update'])->name('biodataStore');    
        
        Route::get('{nisn}/perbaikan-data', [BiodatadiriSiswaController::Class, 'perbaikan_data'])->name('siswa.biodata-diri.perbaikan_data')->middleware('perbaikanDatadiri-siswa');
        Route::patch('{nisn}/update', [BiodatadiriSiswaController::Class, 'update_perbaikan_data'])->name('siswa.biodata-diri.updateperbaikan_data');  
    });

    Route::group(['prefix'  => 'data-tambahan/'],function(){
        Route::patch('/{nisn}/update', [DataTambahanSiswaController::class, 'update'])->name('datatambahan.update');
    });

    Route::group(['prefix'  => 'data-ortu/'],function(){
        Route::get('{nisn}/edit', [DataOrtuSiswaController::Class, 'edit'])->name('data-ortu.edit');
        Route::patch('{nisn}/update', [DataOrtuSiswaController::Class, 'update'])->name('data-ortu.update'); 
        
        Route::get('{nisn}/perbaikan-data', [DataOrtuSiswaController::Class, 'perbaikan_data'])->name('siswa.data-ortu.perbaikan_data')->middleware('perbaikanDataortu-siswa');;
        Route::patch('{nisn}/update', [DataOrtuSiswaController::Class, 'update_perbaikan_data'])->name('siswa.data-ortu.updateperbaikan_data');  
    });

    Route::group(['prefix'  => 'data-berkas/'],function(){
        Route::get('{nisn}/edit', [DataBerkasSiswaController::Class, 'edit'])->name('data-berkas.edit');
        Route::patch('{nisn}/update', [DataBerkasSiswaController::Class, 'update'])->name('data-berkas.update');    
    });

});

//Admin


Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardAdminController::Class, 'index'] )->name('dashboard-admin');
    Route::resource('generate-akun', GenerateSiswaController::class);

    Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriAdminController::Class, 'index'])->name('admin.biodata-diri.index');
        Route::get('{nisn}/show', [BiodatadiriAdminController::Class, 'show'])->name('admin.biodata-diri.show');
        Route::get('{nisn}/edit', [BiodatadiriAdminController::Class, 'edit'])->name('admin.biodata-diri.edit');
        Route::patch('{nisn}/update', [BiodatadiriAdminController::Class, 'update'])->name('admin.biodata-diri.update');
        Route::delete('{nisn}/destroy',[BiodatadiriAdminController::class, 'destroy'])->name('admin.biodata-diri.destroy');
        
        //trash 
        Route::get('trash', [BiodatadiriAdminController::Class, 'trash'])->name('admin.biodata-diri.trash');

        //verifikasi data biodata diri
        Route::patch('{nisn}/verifikasiBiodata', [BiodatadiriAdminController::Class, 'verifikasi'])->name('admin.biodata-diri.verifikasi');
        Route::patch('{nisn}/verifikasiBiodataTolak', [BiodatadiriAdminController::Class, 'verifikasi_tolak'])->name('admin.biodata-diri.verifikasi_tolak');
    });

    Route::group(['prefix'  => 'restore-data/'],function(){
        //retsore mana yang ingin dipilih
        Route::get('{nisn}/restore', [BiodatadiriAdminController::class, 'restore'])->name('admin.sampah.restore');
        //delete secara permanenen yang ingin dipilih
        Route::get('{nisn}/force-delete', [BiodatadiriAdminController::class, 'forcedelete'])->name('admin.sampah.force-delete');
        //restore semua data secara permanen
        Route::get('restore-all', [BiodatadiriAdminController::class, 'restoreAll'])->name('admin.sampah.restoreAll');
    });

    Route::group(['prefix'  => 'orang-tua/'],function(){
        Route::get('{nisn}/show', [DataOrtuAdminController::Class, 'show'])->name('admin.data-ortu.show');
        Route::get('{nisn}/edit', [DataOrtuAdminController::Class, 'edit'])->name('admin.data-ortu.edit');
        Route::patch('{nisn}/update', [DataOrtuAdminController::Class, 'update'])->name('admin.data-ortu.update');
        //verifikasi data biodata diri
        Route::patch('{nisn}/verifikasiOrangtua', [DataOrtuAdminController::Class, 'verifikasi'])->name('admin.data-ortu.verifikasi');
        Route::patch('{nisn}/verifikasiOrangtuaTolak', [DataOrtuAdminController::Class, 'verifikasi_tolak'])->name('admin.data-ortu.verifikasi_tolak');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-transportasi', DataAdminTransportasiController::class);

        Route::get('data-tranportasi-trash', [DataAdminTransportasiController::Class, 'trash'])->name('admin.data-transportasi.trash');
        Route::get('{id}/data-tranpostasi-restore', [DataAdminTransportasiController::class, 'restore'])->name('admin.data-transportasi.restore');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-agama', DataAdminAgamaController::class);

        Route::get('data-agama-trash', [DataAdminAgamaController::Class, 'trash'])->name('admin.data-agama.trash');
        Route::get('{id}/data-agama-restore', [DataAdminAgamaController::class, 'restore'])->name('admin.data-agama.restore');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-jenis-tinggal', DataAdminJenisTinggalController::class);

        Route::get('data-jenis-tinggal-trash', [DataAdminJenisTinggalController::Class, 'trash'])->name('admin.data-jenis-tinggal.trash');
        Route::get('{id}/data-jenis-tinggal-restore', [DataAdminJenisTinggalController::class, 'restore'])->name('admin.data-jenis-tinggal.restore');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-pekerjaan', DataAdminPekerjaanController::class);

        Route::get('data-pekerjaan-trash', [DataAdminPekerjaanController::Class, 'trash'])->name('admin.data-pekerjaan.trash');
        Route::get('{id}/data-pekerjaan-restore', [DataAdminPekerjaanController::class, 'restore'])->name('admin.data-pekerjaan.restore');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-pendidikan', DataAdminPendidikanController::class);

        Route::get('data-pendidikan-trash', [DataAdminPendidikanController::Class, 'trash'])->name('admin.data-pendidikan.trash');
        Route::get('{id}/data-pendidikan-restore', [DataAdminPendidikanController::class, 'restore'])->name('admin.data-pendidikan.restore');
    });

    Route::group(['prefix'  => 'pengaturan/'],function(){
        Route::resource('data-penghasilan', DataAdminPenghasilanController::class);

        Route::get('data-penghasilan-trash', [DataAdminPenghasilanController::Class, 'trash'])->name('admin.data-penghasilan.trash');
        Route::get('{id}/data-penghasilan-restore', [DataAdminPenghasilanController::class, 'restore'])->name('admin.data-penghasilan.restore');
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