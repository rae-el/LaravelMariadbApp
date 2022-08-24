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
Route::get('/cars', [\App\Http\Controllers\CarController::class,'index'])
    ->name('cars.index');
Route::get('/cars/search', [\App\Http\Controllers\SearchController::class,'search'])
    ->name('cars.search');
Route::get('/cars/{car}/show', [\App\Http\Controllers\CarController::class,'show'])
    ->name('cars.show');
//collectors
Route::get('/collectors', [\App\Http\Controllers\CollectorController::class,'index'])
    ->name('collectors.index');
Route::get('/collectors/search', [\App\Http\Controllers\CollectorController::class,'search'])
    ->name('collectors.search');
Route::get('/collectors/{car}/show', [\App\Http\Controllers\CollectorController::class,'show'])
    ->name('collectors.show');

Route::group(['middleware' => ['auth']], function (){
    //cars
    Route::get('/cars/add', [\App\Http\Controllers\CarController::class,'add'])
        ->name('cars.add');
    Route::post('/cars/store', [\App\Http\Controllers\CarController::class,'store'])
        ->name('cars.store');
    Route::get('/cars/{car}/edit', [\App\Http\Controllers\CarController::class,'edit'])
        ->name('cars.edit');
    Route::put('/cars/{car}/update', [\App\Http\Controllers\CarController::class,'update'])
        ->name('cars.update');
    Route::get('/cars/{car}/delete', [\App\Http\Controllers\CarController::class,'delete'])
        ->name('cars.delete');
    Route::delete('/cars/{car}/destroy',[\App\Http\Controllers\CarController::class,'destroy'])
        ->name('cars.destroy');
    //collectors
    Route::get('/collectors/add', [\App\Http\Controllers\collectorController::class,'add'])
        ->name('collectors.add');
    Route::post('/collectors/store', [\App\Http\Controllers\collectorController::class,'store'])
        ->name('collectors.store');
    Route::get('/collectors/{collector}/edit', [\App\Http\Controllers\collectorController::class,'edit'])
        ->name('collectors.edit');
    Route::put('/collectors/{collector}/update', [\App\Http\Controllers\collectorController::class,'update'])
        ->name('collectors.update');
    Route::get('/collectors/{collector}/delete', [\App\Http\Controllers\collectorController::class,'delete'])
        ->name('collectors.delete');
    Route::delete('/collectors/{collector}/destroy',[\App\Http\Controllers\collectorController::class,'destroy'])
        ->name('collectors.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
