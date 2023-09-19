<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ServingTurnController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientTokenController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientNoteController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\PlateImageController;
use App\Http\Controllers\MenuController;


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
// Rutas para SemesterController

<<<<<<< HEAD
// Rutas para SemesterController
Route::resource('semesters', SemesterController::class);

// Rutas para ServingTurnController
Route::resource('serving-turns', ServingTurnController::class);

// Rutas para ClientController
Route::resource('clients', ClientController::class);

// Rutas para ClientTokenController
Route::resource('client-tokens', ClientTokenController::class);

// Rutas para ReservationController
Route::resource('reservations', ReservationController::class);

// Rutas para ClientNoteController
Route::resource('client-notes', ClientNoteController::class);

// Rutas para PlateController
Route::resource('plates', PlateController::class);

// Rutas para PlateImageController
Route::resource('plate-images', PlateImageController::class);

// Rutas para MenuController
Route::resource('menus', MenuController::class);
=======
Route::resource('semesters', SemesterController::class);




// Rutas para ServingTurnController

Route::resource('serving-turns', ServingTurnController::class);




// Rutas para ClientController

Route::resource('client', ClientController::class);




// Rutas para ClientTokenController

Route::resource('client-tokens', ClientTokenController::class);




// Rutas para ReservationController

Route::resource('reservations', ReservationController::class);




// Rutas para ClientNoteController

Route::resource('client-notes', ClientNoteController::class);




// Rutas para PlateController

Route::resource('plates', PlateController::class);




// Rutas para PlateImageController

Route::resource('plate-images', PlateImageController::class);




// Rutas para MenuController

Route::resource('menus', MenuController::class);
>>>>>>> 0804c8ce26e4984273cc270cabdabd3eb1ab3b78
