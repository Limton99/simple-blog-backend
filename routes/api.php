<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\BlogApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthApiController::class, 'login']);
Route::post('register', [AuthApiController::class, 'register']);

Route::group(['prefix'=>'blog'], function () {
    Route::get('/', [BlogApiController::class, 'index']);
    Route::get('/{id}', [BlogApiController::class, 'show']);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('logout', [AuthApiController::class, 'logout']);

    Route::group(['prefix'=>'blog'], function () {
        Route::post('/store', [BlogApiController::class, 'store']);

        Route::group(['middleware' => ['isOwner']], function () {
           Route::put('/{id}/update', [BlogApiController::class, 'update']);
           Route::delete('/{id}/destroy', [BlogApiController::class, 'destroy']);
       });
    });
});
