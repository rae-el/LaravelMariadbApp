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

Route::get('/cars', [\App\Http\Controllers\CarController::class,'index'])
    ->name('cars.index');

Route::get('/cars/add', [\App\Http\Controllers\CarController::class,'add'])
    ->name('cars.add');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
