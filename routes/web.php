<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])
    ->name('welcome');

//cars
Route::get('/cars', [\App\Http\Controllers\CarController::class,'index'])
    ->name('cars.index');
Route::get('/cars/add', [\App\Http\Controllers\CarController::class,'add'])
    ->name('cars.add');
Route::post('/cars/store', [\App\Http\Controllers\CarController::class,'store'])
    ->name('cars.store');
Route::get('/cars/edit', [\App\Http\Controllers\CarController::class,'edit'])
    ->name('cars.edit');
Route::get('/cars/details', [\App\Http\Controllers\CarController::class,'show'])
    ->name('cars.details');
Route::get('/cars/delete', [\App\Http\Controllers\CarController::class,'destroy'])
    ->name('cars.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
