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
use App\Http\Controllers\AdminTokenController;
use App\Http\Controllers\CookingJobController;
use App\Http\Controllers\OccupiedSeatingTableController;
use App\Http\Controllers\SeatingTableController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeePrivilegeController;
use App\Http\Controllers\PaymentInfoController;
use App\Http\Controllers\PlateServingController;
use App\Http\Controllers\ReservationItemController;


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


// Rutas para SemesterController 1
Route::resource('semester', SemesterController::class);

// Rutas para ServingTurnController 2
Route::resource('servingturn', ServingTurnController::class);

// Rutas para ClientController 3
Route::resource('client', ClientController::class);
Route::get('/login', [ClientController::class, 'login'])->name('login');
Route::post('/login', [ClientController::class, 'loginPost'])->name('login.post');
Route::get('/dashboard', [ClientController::class, 'dashboard'])->middleware('auth')->name('dashboard');



// Rutas para ClientTokenController 4
Route::resource('client-token', ClientTokenController::class);

// Rutas para ReservationController 5
Route::resource('reservation', ReservationController::class);

// Rutas para ClientNoteController 6
Route::resource('client-note', ClientNoteController::class);

// Rutas para PlateController 7
Route::resource('plate', PlateController::class);

// Rutas para PlateImageController 8
Route::resource('plate-image', PlateImageController::class);

// Rutas para MenuController 9
Route::resource('menu', MenuController::class);

// Rutas para AdminTokenController 10
Route::resource('admin-token', AdminTokenController::class);

// Rutas para CookingJobController 11
Route::resource('cooking-job', CookingJobController::class);

// Rutas para OccupiedSeatingTableController 12
Route::resource('occupied-seating-table', OccupiedSeatingTableController::class);

// Rutas para SeatingTableController 13
Route::resource('seating-table', SeatingTableController::class);

// Rutas para EmployeeController 14
Route::resource('employee', EmployeeController::class);

// Rutas para EmployeePrivilegeController 15
Route::resource('employee-privilege', EmployeePrivilegeController::class);

// Rutas para PaymentInfoController 16
Route::resource('payment-info', PaymentInfoController::class);

// Rutas para PlateServingController 17
Route::resource('plate-serving', PlateServingController::class);

// Rutas para ReservationItemController 18
Route::resource('reservation-item', ReservationItemController::class);




