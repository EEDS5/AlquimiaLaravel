<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\TipoPlatoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\MenuOfertadoController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\GestionMenuController;

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

Route::post('/register', [ClienteController::class, 'store']);


Route::post('/login', [LoginController::class, 'store']);
// Obtener todas las categorías
Route::get('/categorias', [CategoriaController::class, 'index']);

// Obtener todos los semestres
Route::get('/semestres', [SemestreController::class, 'index']);

// Obtener todos los tipos de platos
Route::get('/tipo-platos', [TipoPlatoController::class, 'index']);

// Obtener todos los turnos
Route::get('/turnos', [TurnoController::class, 'index']);

// Obtener todos los menús ofertados
Route::get('/menu-ofertados', [MenuOfertadoController::class, 'index']);

// Obtener todas las bebidas
Route::get('/bebidas', [BebidaController::class, 'index']);

Route::get('/platos', [PlatoController::class, 'index']);

// Obtener todos los gestiones de menú
Route::get('/gestion-menus', [GestionMenuController::class, 'index']);
Route::post('/gestion-menus', [GestionMenuController::class, 'store']);

// Obtener todos los gestiones de menú
Route::get('/menus-activos', [GestionMenuController::class, 'getMenusActivos']);

// Obtener todos las Reservas
Route::post('/reserva', [ReservaController::class, 'store']);
