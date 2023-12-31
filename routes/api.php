<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro',[AuthController::class,'register']);

Route::post('logueo',[AuthController::class,'login']);

//Rutas que se pueda acceder a ellas cuando estemos en la sesión
Route::middleware(['auth:api'])->group(function(){
    
    Route::get('verProductos',[ProductoController::class,'index']);

    Route::get('cerrarSesion',[AuthController::class,'logout']);
});