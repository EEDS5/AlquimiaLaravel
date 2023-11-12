<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoEmpleadoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoPlatoController;
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

Route::get('/login', [ClienteController::class, 'login'])->name('login');
Route::post('/authenticate', [ClienteController::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [ClientController::class, 'logout'])->name('logout');

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









