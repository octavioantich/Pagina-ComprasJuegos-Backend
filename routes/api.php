<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoController;

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

Route::get('/juegos','App\Http\Controllers\APIJuegoController@index'); //mostrar todos las categorias
Route::get('/juegos/{id}', 'App\Http\Controllers\APIJuegoController@show');

Route::get('/desarrolladores','App\Http\Controllers\APIDesarrolladorController@index');
Route::get('/desarrolladores/{id}', 'App\Http\Controllers\APIDesarrolladorController@show');

Route::get('/categorias','App\Http\Controllers\APICategoriaController@index');
Route::get('/categorias/{id}', 'App\Http\Controllers\APICategoriaController@show');

Route::middleware('auth:sanctum')->get('/usuarios/compras', 'App\Http\Controllers\APIUsuarioController@comprasUsuario');
Route::middleware('auth:sanctum')->post('/logout', 'App\Http\Controllers\APIUsuarioController@logout');
Route::post('/login', 'App\Http\Controllers\APIUsuarioController@login');
Route::post('/register', 'App\Http\Controllers\APIUsuarioController@store');

Route::middleware('auth:sanctum')->post('/compras', 'App\Http\Controllers\APICompraController@store');

Route::middleware('auth:sanctum')->post('/process-payment', [MercadoPagoController::class, 'processPayment']);
