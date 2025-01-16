<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AplicacionController;

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








//rutas para usuarios optimizado
Route::apiResource('usuarios', UsuarioController::class);

// Rutas para Rol
Route::get('/roles', [RolController::class, 'index']);
Route::get('/roles/{id}', [RolController::class, 'show']);

// Rutas para Catalogo
Route::get('/catalogos', [CatalogoController::class, 'index']);
Route::get('/catalogos/{id}', [CatalogoController::class, 'show']);


// Ruta para el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);

//rutas para la logica de la tabla de aplicaciones
Route::apiResource('aplicaciones', AplicacionController::class);



