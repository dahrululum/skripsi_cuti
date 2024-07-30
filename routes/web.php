<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
 
 
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

 

//Route::get('/', [AdminController::class,'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController::class,'index']);
Route::post('pegawai/postlogin', [FrontController::class,'postLogin']);
//admin
Route::get('admin', [AdminController::class,'index'])->name('admin.index');
Route::get('admin/login', [AdminController::class,'index'])->name('admin.login');
Route::post('admin/postlogin', [AdminController::class,'postLogin']);

Route::post('admin/logout',[AdminController::class,'postLogout'] );
 
/* user */
Route::get('admin/useradmin', [AdminController::class,'useradmin'])->name('admin.useradmin');
Route::get('/admin/adduseradmin', [AdminController::class,'adduseradmin'])->name('admin.adduseradmin');
Route::post('/admin/post-adduseradmin', [AdminController::class,'postAdduseradmin']); 
Route::get('/admin/edituseradmin/{id}',  [AdminController::class,'edituseradmin'])->name('admin.edituser');
Route::post('/admin/post-edituseradmin', [AdminController::class,'postEdituseradmin']); 

Route::get('admin/userpd', [AdminController::class,'userpd'])->name('admin.userpd');
Route::get('/admin/adduserpd', [AdminController::class,'adduserpd'])->name('admin.adduserpd');
Route::post('/admin/post-adduserpd', [AdminController::class,'postAdduserpd']); 
Route::get('/admin/edituserpd/{id}',  [AdminController::class,'edituserpd'])->name('admin.edituserpd');
Route::post('/admin/post-edituserpd', [AdminController::class,'postEdituserpd']); 

Route::get('/admin/deluser/{id}',  [AdminController::class,'deluser']);
 
//24 07 2024
//utilitas
Route::get('admin/unitkerja', [AdminController::class,'unitkerja'])->name('admin.unitkerja');
Route::get('/admin/addunitkerja', [AdminController::class,'addunitkerja'])->name('admin.addunitkerja');
Route::post('/admin/post-addunitkerja', [AdminController::class,'postAddunitkerja']); 
Route::get('/admin/editunitkerja/{id}',  [AdminController::class,'editunitkerja'])->name('admin.editunitkerja');
Route::post('/admin/post-editunitkerja', [AdminController::class,'postEditunitkerja']); 

Route::get('admin/jabatan', [AdminController::class,'jabatan'])->name('admin.jabatan');
Route::get('/admin/addjabatan', [AdminController::class,'addjabatan'])->name('admin.addjabatan');
Route::post('/admin/post-addjabatan', [AdminController::class,'postAddjabatan']); 
Route::get('/admin/editjabatan/{id}',  [AdminController::class,'editjabatan'])->name('admin.editjabatan');
Route::post('/admin/post-editjabatan', [AdminController::class,'postEditjabatan']); 

Route::get('admin/pangkat', [AdminController::class,'pangkat'])->name('admin.pangkat');
Route::get('/admin/addpangkat', [AdminController::class,'addpangkat'])->name('admin.addpangkat');
Route::post('/admin/post-addpangkat', [AdminController::class,'postAddpangkat']); 
Route::get('/admin/editpangkat/{id}',  [AdminController::class,'editpangkat'])->name('admin.editpangkat');
Route::post('/admin/post-editpangkat', [AdminController::class,'postEditpangkat']); 

Route::get('admin/golongan', [AdminController::class,'golongan'])->name('admin.golongan');
Route::get('/admin/addgolongan', [AdminController::class,'addgolongan'])->name('admin.addgolongan');
Route::post('/admin/post-addgolongan', [AdminController::class,'postAddgolongan']); 
Route::get('/admin/editgolongan/{id}',  [AdminController::class,'editgolongan'])->name('admin.editgolongan');
Route::post('/admin/post-editgolongan', [AdminController::class,'postEditgolongan']); 

Route::get('admin/jeniscuti', [AdminController::class,'jeniscuti'])->name('admin.jeniscuti');
Route::get('/admin/addjeniscuti', [AdminController::class,'addjeniscuti'])->name('admin.addjeniscuti');
Route::post('/admin/post-addjeniscuti', [AdminController::class,'postAddjeniscuti']); 
Route::get('/admin/editjeniscuti/{id}',  [AdminController::class,'editjeniscuti'])->name('admin.editjeniscuti');
Route::post('/admin/post-editjeniscuti', [AdminController::class,'postEditjeniscuti']); 

Route::get('admin/pegawai', [AdminController::class,'pegawai'])->name('admin.pegawai');
Route::get('/admin/addpegawai', [AdminController::class,'addpegawai'])->name('admin.addpegawai');
Route::post('/admin/post-addpegawai', [AdminController::class,'postAddpegawai']); 
Route::get('/admin/editpegawai/{id}',  [AdminController::class,'editpegawai'])->name('admin.editpegawai');
Route::post('/admin/post-editpegawai', [AdminController::class,'postEditpegawai']); 

//aju cuti
Route::get('admin/ajucuti', [AdminController::class,'ajucuti'])->name('admin.ajucuti');
Route::get('/admin/addajucuti', [AdminController::class,'addajucuti'])->name('admin.addajucuti');
Route::post('/admin/post-addajucuti', [AdminController::class,'postAddajucuti']); 

Route::get('/admin/printajucuti/{id}',  [AdminController::class,'printajucuti'])->name('admin.printajucuti');

//fppc
Route::get('admin/verifikasicuti', [AdminController::class,'verifikasicuti'])->name('admin.verifikasicuti');
Route::get('/admin/addfppc', [AdminController::class,'addfppc'])->name('admin.addfppc');
Route::post('/admin/post-addfppc', [AdminController::class,'postAddfppc']); 

Route::get('admin/dialog_cari_nopc', [AdminController::class,'dialogcarinopc'])->name('admin.dialogcarinopc');
Route::get('admin/detail_pegawai/{id}/{nopc}', [AdminController::class,'detailpegawai'])->name('admin.detailpegawai');
Route::get('admin/dialog_riwayatcuti/{id}/{nopc}', [AdminController::class,'dialogriwayatcuti'])->name('admin.dialogriwayatcuti');



Route::get('/admin/printfppc/{id}',  [AdminController::class,'printfppc'])->name('admin.printfppc');
Route::get('admin/rekapcuti', [AdminController::class,'rekapcuti'])->name('admin.rekapcuti');
Route::get('admin/printrekapcuti', [AdminController::class,'printrekapcuti'])->name('admin.printrekapcuti');


//jenis
Route::get('admin/jenis', [AdminController::class,'jenis'])->name('admin.jenis');
//periode
Route::get('admin/periode', [AdminController::class,'periode'])->name('admin.periode');
Route::get('admin/status-periode/', [AdminController::class,'periodestatus'])->name('periodestatus');

//elemen
Route::get('admin/elemen', [AdminController::class,'elemen'])->name('admin.elemen');
Route::get('/admin/addelemen', [AdminController::class,'addelemen'])->name('admin.addelemen');
Route::post('/admin/post-addelemen', [AdminController::class,'postAddelemen']); 
Route::get('/admin/editelemen/{id}',  [AdminController::class,'editelemen'])->name('admin.editelemen');
Route::post('/admin/post-editelemen', [AdminController::class,'postEditelemen']); 
Route::get('/admin/delelemen/{id}',  [AdminController::class,'delelemen']);

//nilai
Route::get('admin/nilai/{id?}', [AdminController::class,'nilai'])->name('admin.nilai');
Route::post('admin/post-nilaielemen', [AdminController::class,'postNilaielemen']);

Route::get('admin/laporan/{id?}', [AdminController::class,'laporan'])->name('admin.laporan');

//publikasi & informasi
Route::get('admin/publikasi', [AdminController::class,'publikasi'])->name('admin.publikasi');
Route::get('/admin/addpublikasi', [AdminController::class,'addpublikasi'])->name('admin.addpublikasi');
Route::post('/admin/post-addpublikasi', [AdminController::class,'postAddpublikasi']); 
Route::get('/admin/editpublikasi/{id}',  [AdminController::class,'editpublikasi'])->name('admin.editpublikasi');
Route::post('/admin/post-editpublikasi', [AdminController::class,'postEditpublikasi']); 
Route::get('/admin/delpublikasi/{id}',  [AdminController::class,'delpublikasi']);

Route::get('admin/dialog_uploadpub/{id}/{label}', [AdminController::class,'dialoguploadpub'])->name('admin.dialoguploadpub');
Route::post('/admin/uploadactionpub',  [AdminController::class,'uploadactionpub'])->name('admin.uploadactionpub');

Route::get('admin/weblink', [AdminController::class,'weblink'])->name('admin.weblink');
Route::get('/admin/addweblink', [AdminController::class,'addweblink'])->name('admin.addweblink');
Route::post('/admin/post-addweblink', [AdminController::class,'postAddweblink']); 
Route::get('/admin/editweblink/{id}',  [AdminController::class,'editweblink'])->name('admin.editweblink');
Route::post('/admin/post-editweblink', [AdminController::class,'postEditweblink']); 
Route::get('/admin/delweblink/{id}',  [AdminController::class,'delweblink']);

Route::get('admin/dialog_uploadwl/{id}/{label}', [AdminController::class,'dialoguploadwl'])->name('admin.dialoguploadwl');
Route::post('/admin/uploadactionwl',  [AdminController::class,'uploadactionwl'])->name('admin.uploadactionwl');


//Route::get('/admin/resetuser/{id}', 'Auth\AdminAuthController@resetuser')->name('admin.resetuser');
//Route::post('/admin/post-resetuser', 'Auth\AdminAuthController@postResetuser'); 

 

