<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\VehiculoController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\Combo_servicioController;
use App\Http\Controllers\Api\Combo_serDetalleController;
use App\Http\Controllers\Api\InventarioPiezaController;
use App\Http\Controllers\Api\ComboPiezaDetalleController;
use App\Http\Controllers\Api\OrdenTrabajoController;
use App\Http\Controllers\Api\OrdenSerDetalleController;
use App\Http\Controllers\Api\OrdenPiezasDetController;
use App\Http\Controllers\Api\InstitucionController;
use App\Http\Controllers\Api\VehiculoInstController;
use App\Http\Controllers\Api\NotificacionController;
use App\Http\Controllers\Api\FacturaController;
use App\Http\Controllers\Api\PagoController;


//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:sanctum');
Route::get('/', function () {
     return 'API Taller Mecanico';
});

Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('vehiculos', VehiculoController::class);
Route::apiResource('servicios', ServicioController::class);
Route::apiResource('combo_servicio', Combo_servicioController::class);
Route::apiResource('cservicio_detalle', Combo_serDetalleController::class);
Route::apiResource('inventariopieza', InventarioPiezaController::class);
Route::apiResource('combopiezadetalle', ComboPiezaDetalleController::class);
Route::apiResource('ordentrabajo', OrdenTrabajoController::class);
Route::apiResource('ordenserdetalle', OrdenSerDetalleController::class);
Route::apiResource('ordenpiezasdet', OrdenPiezasDetController::class);
Route::apiResource('factura', FacturaController::class);
Route::apiResource('pago', PagoController::class);
Route::apiResource('institucion', InstitucionController::class);
Route::apiResource('vehiculoinstotucion', VehiculoInstController::class);
Route::apiResource('notificacion', NotificacionController::class);