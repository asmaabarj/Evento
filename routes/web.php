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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//-------------------------------------------------------------------------

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminPage'])->name('admin');
    Route::get('/addCategory', function () {
        return view('admin.addCategory');
    })->name('addCategory');
    Route::get('/manageClient', function () {
        return view('admin.manageClient');
    })->name('manageClient');
    Route::get('/manageEvents', [AdminController::class, 'manageEvents'])->name('manageEvents'); 
    Route::post('/updateCategorie', [AdminController::class, 'updateCategorie']);
    Route::match(['get', 'post'], '/editCatgory', [AdminController::class, 'index']);
    Route::get('/manageOrganizer', function () {
        return view('admin.manageOrganizer');
    })->name('manageOrganizer');
    Route::post('/categories', [AdminController::class, 'store'])->name('categories.store');
    Route::get('/manageCategory', [AdminController::class, 'index'])->name('manageCategory');
    Route::delete('/categories/{id}', [AdminController::class, 'destroy'])->name('categories.destroy');
    Route::post('/events/{id}/accept', [AdminController::class, 'acceptEvent'])->name('events.accept');
    Route::post('/events/{id}/refuse', [AdminController::class, 'refuseEvent'])->name('events.refuse');

});


// ---------------------------------------------------------------------------------------------

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', function () {
        return view('organisateur.organisateur');
    })->name('organisateur');
    Route::match(['get', 'post'], '/addEvent', [OrganiserController::class, 'store'])->name('addEvent');
    Route::get('/manageEvent', [OrganiserController::class, 'index']);
    Route::get('/manageReservation', [OrganiserController::class, 'CheckReservation']);
    Route::post('/reservation/{id}/accept', [OrganiserController::class, 'acceptReservation'])->name('reservation.accept');

});




// ---------------------------------------------------------------------------------------------

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', [clientController::class, 'index'])->name('client');
    Route::post('/reserveEvent/{eventId}/{user_id}', [clientController::class, 'reserveEvent']);
    
});