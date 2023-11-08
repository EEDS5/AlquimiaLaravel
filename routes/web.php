<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Persona;
use App\Http\Controllers\Cliente;
use App\Http\Controllers\TipoEmpleado;
use App\Http\Controllers\Empleado;
use App\Http\Controllers\TipoPlato;
use App\Http\Controllers\Plato;
use App\Http\Controllers\Bebida;
use App\Http\Controllers\Categoria;
use App\Http\Controllers\Menu;
use App\Http\Controllers\Pago;
use App\Http\Controllers\Reserva;
use App\Http\Controllers\Turno;
use App\Http\Controllers\Entrada;
use App\Http\Controllers\GestionMenu;
use App\Http\Controllers\ComprobanteDePago;



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

Route::get('/login', [ClientController::class, 'login'])->name('login');
Route::post('/authenticate', [ClientController::class, 'authenticate'])->name('authenticate');

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









