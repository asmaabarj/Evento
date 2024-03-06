<?php

use App\Models\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganisateurController;
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
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
    
    Route::get('/addCategory', function () {
        return view('admin.addCategory');
    })->name('addCategory');
    Route::get('/manageClient', function () {
        return view('admin.manageClient');
    })->name('manageClient');
    Route::get('/admin', [CategoryController::class, 'adminPage'])->name('admin');
    Route::post('/updateCategorie', [CategoryController::class, 'updateCategorie']);
    Route::match(['get', 'post'] , '/editCatgory', [CategoryController::class, 'index']);

    Route::get('/manageOrganizer', function () {
        return view('admin.manageOrganizer');
    })->name('manageOrganizer');
    
    Route::get('/manageReservation', function () {
        return view('admin.manageReservation');
    })->name('manageReservation');
    
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/manageCategory', [CategoryController::class, 'index'])->name('manageCategory');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});

// ---------------------------------------------------------------------------------------------

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', function () {
        return view('organisateur.organisateur');
    })->name('organisateur');
    Route::get('/addEvent', function () {
        return view('organisateur.addEvent');
    })->name('addEvent');
    Route::get('/manageEvent', function () {
        return view('organisateur.manageEvent');
    })->name('manageEvent');
    Route::get('/manageReservation', function () {
        return view('organisateur.manageReservation');
    })->name('manageReservation');

}); 

// ---------------------------------------------------------------------------------------------

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', function () {
        return view('client.client');
    })->name('client');
});