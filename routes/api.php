<?php

use App\Http\Controllers\productosController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("/lista_productos",[productosController::class,'listar_productos'])->middleware(('auth:api'));

Route::post("/login",[loginController::class,'login']);
Route::post("/logout",[loginController::class,'salir'])->middleware(('auth:api'));

Route::post("/guarda_producto",[productosController::class,'guarda_producto']);//->middleware(('auth:sanctum'));
Route::post("/borra_producto",[productosController::class,'borra_producto']);//->middleware(('auth:api'));
Route::post("/lista_clientes",[clientesController::class,'listar_clientes'])->middleware(('auth:api'));
Route::post("/guarda_clientes",[clientesController::class,'guarda_clientes']);//->middleware(('auth:api'));
Route::post("/borra_clientes",[clientesController::class,'borra_clientes']);//->middleware(('auth:api'));
Route::post("/lista_usuarios",[usuariosController::class,'listar_usuarios'])->middleware(('auth:api'));
Route::post("/guarda_usuarios",[usuariosController::class,'guarda_usuarios']);//->middleware(('auth:api'));
Route::post("/borra_usuarios",[usuariosController::class,'borra_usuarios']);//->middleware(('auth:api'));
//Route::get("/lista_user",[userController::class,'login']);
//Route::get("/borra_producto",[productosController::class,'borra_producto']);//->middleware(('auth:sanctum'));

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
