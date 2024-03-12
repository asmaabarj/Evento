<?php

use App\Models\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\organiserController;
use App\Http\Middleware\RedirectIfAuthenticated;

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
})->middleware(RedirectIfAuthenticated::class);



//-----------------------------------ADMIN--------------------------------------

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminPage'])->name('admin');
    Route::get('/addCategory', function () {
        return view('admin.addCategory');
    })->name('addCategory');
    Route::get('/manageClient',  [AdminController::class, 'banClient']);
    Route::get('/manageOrganizer',  [AdminController::class, 'banOrganizer']);
    Route::get('/manageEvents', [AdminController::class, 'manageEvents'])->name('manageEvents'); 
    Route::post('/updateCategorie', [AdminController::class, 'updateCategorie']);
    Route::match(['get', 'post'], '/editCatgory', [AdminController::class, 'index']);
    Route::post('/categories', [AdminController::class, 'store'])->name('categories.store');
    Route::get('/manageCategory', [AdminController::class, 'index'])->name('manageCategory');
    Route::delete('/categories/{id}', [AdminController::class, 'destroy'])->name('categories.destroy');
    Route::post('/events/{id}/accept', [AdminController::class, 'acceptEvent'])->name('events.accept');
    Route::post('/events/{id}/refuse', [AdminController::class, 'refuseEvent'])->name('events.refuse');
    Route::delete('/archiveUser/{id}/', [AdminController::class, 'archiveUser']);
});


// --------------------------------------ORGANISATEUR-------------------------------------------------------

    Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', [OrganiserController::class, 'showEvents'])->name('organisateur');
    Route::match(['get', 'post'], '/addEvent', [OrganiserController::class, 'store'])->name('addEvent');
    Route::get('/manageEvent', [OrganiserController::class, 'index'])->name('manageEvent');
    Route::get('/manageReservation', [OrganiserController::class, 'checkReservation'])->name('manageReservation');
    Route::post('/reservation/{id}/accept', [OrganiserController::class, 'acceptReservation'])->name('reservation.accept');
    Route::get('/editEvent', [OrganiserController::class, 'store'])->name('editEvent');
    Route::post('/updateEvent/{id}', [OrganiserController::class, 'updateEvent'])->name('updateEvent');
    Route::post('/deletEvent/{id}', [OrganiserController::class, 'deletEvent'])->name('deletEvent');
    Route::get('/manualEvents', [OrganiserController::class, 'showEvents'])->name('manualEvents');
});






// ---------------------------------------CLIENT------------------------------------------------------

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', [clientController::class, 'index'])->name('client');
    Route::post('/reserveEvent/{eventId}/{user_id}', [clientController::class, 'reserveEvent']);
    Route::get('/Reservations', [clientController::class, 'Reservations']);
    Route::get('/tickets/{idReservation}', [ClientController::class, 'tickets'])->name('tickets');

});