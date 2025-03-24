<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DeduccionController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\ReporteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('asistencias', AsistenciaController::class);
Route::apiResource('empleados', EmpleadoController::class);
Route::apiResource('contratos', ContratoController::class);
Route::apiResource('pagos', PagoController::class);
Route::apiResource('deducciones', DeduccionController::class);
Route::get('recibos/{id}/pdf', [ReciboController::class, 'generarReciboPDF']);
Route::get('reportes/pagos/excel', [ReporteController::class, 'exportarPagosExcel']);

