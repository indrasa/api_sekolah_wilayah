<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\WilayahController;

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

Route::prefix('sekolah')->group(function () {
    Route::get('/', [SekolahController::class, 'index']);
    Route::get('/{nama_sekolah}', [SekolahController::class, 'find_by_name']);
});
Route::prefix('wilayah')->group(function () {
    Route::get('/', [WilayahController::class, 'index']);
    Route::get('/{kecamatan}', [WilayahController::class, 'find_by_name']);
    Route::get('/{id}/detail', [WilayahController::class, 'detail']);
});
