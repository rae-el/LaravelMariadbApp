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
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/cars',[CarAPIController::class, 'index'])->name('cars.index');
    Route::get('/cars/{car}/show',[CarAPIController::class, 'show'])->name('cars.show');
    Route::post('/cars/store',[CarAPIController::class, 'store'])->name('cars.store');
    Route::put('/cars/{car}/update',[CarAPIController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}/destroy',[CarAPIController::class, 'destroy'])->name('cars.destroy');
});
