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
 
//10 06 2024
//wilayah
Route::get('admin/wilayah', [AdminController::class,'wilayah'])->name('admin.wilayah');
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

 

