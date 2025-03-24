<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DeduccionController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ReporteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});*/

/*Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');
    /*Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');*/
   /* Route::get('{any}', [RoutingController::class, 'root'])->name('any');

    Route::resource('empleados', EmpleadoController::class);
    Route::resource('contratos', ContratoController::class);
    Route::resource('pagos', PagoController::class);
    Route::resource('asistencias', AsistenciaController::class);
});*/
Route::get('/', function () {
    return view('index');  // Retorna la vista home.blade.php
})->name('index');

Route::get('/dashboard', function () {
    return view('index');  // Retorna la vista home.blade.php
})->name('dashboard');

Route::resource('empleados', EmpleadoController::class);
Route::resource('contratos', ContratoController::class);
Route::resource('pagos', PagoController::class);
Route::resource('asistencias', AsistenciaController::class);
Route::get('/exportar-pagos', [ReporteController::class, 'exportarPagos'])->name('exportar.pagos');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
