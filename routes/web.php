<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;

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

Route::middleware(['auth', 'verified', 'CheckUserRole:admin,gameMaintenance'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categorias', 'App\Http\Controllers\CategoriaController')
        ->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::resource('juegos', 'App\Http\Controllers\JuegoController')
        ->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

    // Rutas de desarrolladores restringidas al rol "admin"
    Route::resource('desarrolladores', 'App\Http\Controllers\DesarrolladorController')
        ->middleware('CheckUserRole:admin');

    // Rutas de compras restringidas al rol "admin"
    Route::resource('compras', 'App\Http\Controllers\CompraController')
        ->middleware('CheckUserRole:admin');
});


require __DIR__.'/auth.php';
