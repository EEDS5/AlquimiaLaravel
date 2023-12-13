<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoPersonaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoPlatoController;
use App\Http\Controllers\TipoEmpleadoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\GestionMenuController;
use App\Http\Controllers\ComprobanteDePagoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\Plato;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');



Route::get('/register', [ClienteController::class, 'index'])->name('register');
Route::post('/register', [ClienteController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva.index');


Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');


Route::get('/persona', [Persona::class, 'index'])->name('persona.index');
Route::get('/persona/create', [Persona::class, 'create'])->name('persona.create');
Route::post('/persona', [Persona::class, 'store'])->name('persona.store');
Route::get('/persona/{id}', [Persona::class, 'show'])->name('persona.show');
Route::get('/persona/{id}/edit', [Persona::class, 'edit'])->name('persona.edit');
Route::put('/persona/{id}', [Persona::class, 'update'])->name('persona.update');
Route::delete('/persona/{id}', [Persona::class, 'destroy'])->name('persona.destroy');

Route::get('/cliente', [Cliente::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [Cliente::class, 'create'])->name('cliente.create');
Route::post('/cliente', [Cliente::class, 'store'])->name('cliente.store');
Route::get('/cliente/{id}', [Cliente::class, 'show'])->name('cliente.show');
Route::get('/cliente/{id}/edit', [Cliente::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [Cliente::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{id}', [Cliente::class, 'destroy'])->name('cliente.destroy');

Route::get('/tipoempleado', [TipoEmpleado::class, 'index'])->name('tipoempleado.index');
Route::get('/tipoempleado/create', [TipoEmpleado::class, 'create'])->name('tipoempleado.create');
Route::post('/tipoempleado', [TipoEmpleado::class, 'store'])->name('tipoempleado.store');
Route::get('/tipoempleado/{id}', [TipoEmpleado::class, 'show'])->name('tipoempleado.show');
Route::get('/tipoempleado/{id}/edit', [TipoEmpleado::class, 'edit'])->name('tipoempleado.edit');
Route::put('/tipoempleado/{id}', [TipoEmpleado::class, 'update'])->name('tipoempleado.update');
Route::delete('/tipoempleado/{id}', [TipoEmpleado::class, 'destroy'])->name('tipoempleado.destroy');

Route::get('/empleado', [Empleado::class, 'index'])->name('empleado.index');
Route::get('/empleado/create', [Empleado::class, 'create'])->name('empleado.create');
Route::post('/empleado', [Empleado::class, 'store'])->name('empleado.store');
Route::get('/empleado/{id}', [Empleado::class, 'show'])->name('empleado.show');
Route::get('/empleado/{id}/edit', [Empleado::class, 'edit'])->name('empleado.edit');
Route::put('/empleado/{id}', [Empleado::class, 'update'])->name('empleado.update');
Route::delete('/empleado/{id}', [Empleado::class, 'destroy'])->name('empleado.destroy');

Route::get('/plato', [PlatoController::class, 'index']);
Route::get('/plato/create', [PlatoController::class, 'create'])->name('platos.create');
Route::post('/plato', [PlatoController::class, 'store'])->name('platos.store');
Route::get('/plato/{plato}', [PlatoController::class, 'show'])->name('platos.show');
Route::get('/plato/{plato}/edit', [PlatoController::class, 'edit'])->name('platos.edit');
Route::put('/plato/{plato}', [PlatoController::class, 'update'])->name('platos.update');
Route::delete('/plato/{plato}', [PlatoController::class, 'destroy'])->name('platos.destroy');

Route::post('/reserva', [ReservaController::class, 'store']);

Route::get('/tipoPlatos', [TipoPlatoController::class, 'index']);
Route::get('/tipoPlatos/create', [TipoPlatoController::class, 'create'])->name('tipoPlatos.create');
Route::post('/tipoPlatos', [TipoPlatoController::class, 'store'])->name('tipoPlatos.store');
Route::resource('tipoPlatos', TipoPlatoController::class);

// Rutas para Categoria
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');








