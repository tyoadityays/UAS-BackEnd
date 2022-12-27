<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ControllerApiAgama;
use App\Http\Controllers\api\ControllerApiUser;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/agama/listagamabaru92', [ControllerApiAgama::class, 'index92'] );
Route::get('/agama/detailagamabaru92/{id}', [ControllerApiAgama::class, 'show92'] );
Route::post('/agama/addagamabaru92/', [ControllerApiAgama::class, 'store92'] );
Route::put('/agama/updateagamabaru92/{id}', [ControllerApiAgama::class, 'update92'] );
Route::delete('/agama/deleteagamabaru92/{id}', [ControllerApiAgama::class, 'destroy92'] );

Route::get('/admin/datauser92', [ControllerApiUser::class, 'index92'] );
Route::delete('/admin/hapusdatauser92/{id}', [ControllerApiUser::class, 'destroy92'] );
Route::put('/admin/approveuser92/{id}', [ControllerApiUser::class, 'approve92'] );
Route::put('/admin/unapproveuser92/{id}', [ControllerApiUser::class, 'unapprove92'] );
Route::get('/admin/detaildatauser92/{id}', [ControllerApiUser::class, 'detail92'] );

// Route::get('/user/profileuser92', [ControllerApiUser::class, 'profile92'] );
Route::put('/user/editprofileuser92/{id}', [ControllerApiUser::class, 'editprofile92'] );
Route::put('/user/uploadfotoktp92/{id}', [ControllerApiUser::class, 'uploadktp92'] );
Route::put('/user/uploadfotoprofil92/{id}', [ControllerApiUser::class, 'uploadfoto92'] );
// Route::get('/user/updatepassword92', [ControllerApiUser::class, 'password92'] );
Route::put('/user/prosesupdatepassword92/{id}', [ControllerApiUser::class, 'prosespassword92'] );
Route::post('/user/uuploadfotoktp92', [ControllerApiUser::class, 'uuploadktp92'] );
Route::post('/user/uuploadfotoprofil92', [ControllerApiUser::class, 'uuploadfoto92'] );
Route::post('/user/prosesprofileuser92', [ControllerApiUser::class, 'tambahprofile92'] );