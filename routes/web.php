<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
//if details was show it couldve been 1 line
//Route::resource('cars', CarController::class);

Route::get('/cars', [\App\Http\Controllers\CarController::class,'index'])
    ->name('cars.index');
Route::get('/cars/{car}/show', [\App\Http\Controllers\CarController::class,'show'])
    ->name('cars.show');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/cars/add', [\App\Http\Controllers\CarController::class,'add'])
        ->name('cars.add');
    Route::post('/cars/store', [\App\Http\Controllers\CarController::class,'store'])
        ->name('cars.store');
    Route::get('/cars/{car}/edit', [\App\Http\Controllers\CarController::class,'edit'])
        ->name('cars.edit');
    Route::put('/cars/{car}/update', [\App\Http\Controllers\CarController::class,'update'])
        ->name('cars.update');
    Route::get('/cars/delete', [\App\Http\Controllers\CarController::class,'destroy'])
        ->name('cars.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
