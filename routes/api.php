<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarAPIController;


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
/*Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/api/cars',[CarAPIController::class, 'index']);
    Route::get('/api/cars/{car}/show',[CarAPIController::class, 'show']);
    Route::post('/api/cars/store',[CarAPIController::class, 'store']);
    Route::put('/api/cars/{car}/update',[CarAPIController::class, 'update']);
    Route::delete('/api/cars/{car}/destroy',[CarAPIController::class, 'destroy']);
});*/


Route::resource('cars','App\Http\Controllers\API\CarAPIController');

