<?php

use App\Models\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/manageCategory', function () {
        return view('admin.manageCategory');
    })->name('manageCategory');
    Route::get('/manageClient', function () {
        return view('admin.manageClient');
    })->name('manageClient');
    Route::get('/manageOrganizer', function () {
        return view('admin.manageOrganizer');
    })->name('manageOrganizer');
    Route::get('/manageReservation', function () {
        return view('admin.manageReservation');
    })->name('manageReservation');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

});

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', function () {
        return view('organisateur.organisateur');
    })->name('organisateur');
}); 

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', function () {
        return view('client.client');
    })->name('client');
});