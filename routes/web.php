<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penduduk92Controller;
use App\Http\Controllers\Login92Controller;
use App\Http\Controllers\User92Controller;
use App\Http\Controllers\Agama92Controller;
use App\Http\Controllers\ApiClientUserController;
use App\Http\Controllers\ApiClientAgamaController;

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

// Route::get('/', [Penduduk92Controller::class, 'index92'] )->middleware('auth','aktif','role:user');
// Route::get('/datapenduduk92', [Penduduk92Controller::class, 'index92'] )->middleware('auth','aktif','role:user');
// Route::get('/adddatapenduduk92', [Penduduk92Controller::class, 'adddatapenduduk92'] );
// Route::post('/prosesaddpenduduk92', [Penduduk92Controller::class, 'store92'] );
// Route::delete('hapusdatapenduduk92/{id}', [Penduduk92Controller::class, 'destroy92']);
// Route::get('/editdatapenduduk92/{id}', [Penduduk92Controller::class, 'editdata92'] );
// Route::put('/proseseditpenduduk92/{id}', [Penduduk92Controller::class, 'update92']);

//login
Route::get('/', [Login92Controller::class, 'index92'] );
Route::get('/register92', [Login92Controller::class, 'register92'] );
Route::post('/prosesregister92', [Login92Controller::class, 'prosesregister92'] );
Route::get('/login92', [Login92Controller::class, 'login92'] )->name("login92");
Route::post('/proseslogin92', [Login92Controller::class, 'proseslogin92'] );
Route::get('/logout92', [Login92Controller::class, 'logout92'] );

//admin
Route::get('/datauser92', [User92Controller::class, 'index92'] )->middleware('auth','role:admin');
Route::delete('hapusdatauser92/{id}', [User92Controller::class, 'destroy92']);
Route::put('/approveuser92/{id}', [User92Controller::class, 'approve92'] );
Route::put('/unapproveuser92/{id}', [User92Controller::class, 'unapprove92'] );
Route::get('/detaildatauser92/{id}', [User92Controller::class, 'detail92'] );

//agama
Route::get('/dataagama92', [Agama92Controller::class, 'dataagama92'] )->middleware('auth','role:admin');
Route::get('/adddataagama92', [Agama92Controller::class, 'adddataagama92'] );
Route::post('/prosesaddagama92', [Agama92Controller::class, 'prosesdataagama92'] );

//user
Route::get('/profileuser92', [User92Controller::class, 'profile92'] )->middleware('auth','role:user','aktif');
Route::post('/editprofileuser92', [User92Controller::class, 'editprofile92'] );
Route::post('/uploadfotoktp92', [User92Controller::class, 'uploadktp92'] );
Route::post('/uploadfotoprofil92', [User92Controller::class, 'uploadfoto92'] );
Route::get('/updatepassword92', [User92Controller::class, 'password92'] )->middleware('auth','role:user');
Route::post('/prosesupdatepassword92', [User92Controller::class, 'prosespassword92'] );
Route::post('/uuploadfotoktp92', [User92Controller::class, 'uuploadktp92'] );
Route::post('/uuploadfotoprofil92', [User92Controller::class, 'uuploadfoto92'] );
Route::post('/prosesprofileuser92', [User92Controller::class, 'tambahprofile92'] );

//api admin
Route::get('/admin/clientapi/datauser92', [ApiClientUserController::class, 'index92'] )->middleware('auth','role:admin');
Route::delete('/admin/clientapi/hapusdatauser92/{id}', [ApiClientUserController::class, 'destroy92']);
Route::put('/admin/clientapi/approveuser92/{id}', [ApiClientUserController::class, 'approve92'] );
Route::put('/admin/clientapi/unapproveuser92/{id}', [ApiClientUserController::class, 'unapprove92'] );
Route::get('/admin/clientapi/detaildatauser92/{id}', [ApiClientUserController::class, 'detail92'] );

//api agama
Route::get('/agama/clientapi/agamalist92', [ApiClientAgamaController::class, 'index92'] )->middleware('auth','role:admin');
Route::get('/agama/clientapi/addagama92', [ApiClientAgamaController::class, 'create92'] );
Route::post('/agama/clientapi/prosesaddagama92', [ApiClientAgamaController::class, 'store92'] );
Route::get('/agama/clientapi/editagama92/{id}', [ApiClientAgamaController::class, 'edit92'] );
Route::put('/agama/clientapi/proseseditagama92/{id}', [ApiClientAgamaController::class, 'update92'] );
Route::delete('/agama/clientapi/hapusagama92/{id}', [ApiClientAgamaController::class, 'destroy92'] );  

//api user
Route::get('/user/clientapi/profileuser92', [ApiClientUserController::class, 'profile92'] )->middleware('auth','role:user','aktif');
Route::put('/user/clientapi/editprofileuser92/{id}', [ApiClientUserController::class, 'editprofile92'] );
Route::put('/user/clientapi/uploadfotoktp92/{id}', [ApiClientUserController::class, 'uploadktp92'] );
Route::put('/user/clientapi/uploadfotoprofil92/{id}', [ApiClientUserController::class, 'uploadfoto92'] );
Route::get('/user/clientapi/updatepassword92', [ApiClientUserController::class, 'password92'] )->middleware('auth','role:user');
Route::put('/user/clientapi/prosesupdatepassword92/{id}', [ApiClientUserController::class, 'prosespassword92'] );
Route::post('/user/clientapi/uuploadfotoktp92', [ApiClientUserController::class, 'uuploadktp92'] );
Route::post('/user/clientapi/uuploadfotoprofil92', [ApiClientUserController::class, 'uuploadfoto92'] );
Route::post('/user/clientapi/prosesprofileuser92', [ApiClientUserController::class, 'tambahprofile92'] );