<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('staff', \App\Http\Controllers\StaffController::class);
});

Route::middleware(['auth', 'role:staff,admin'])->group(function () {
    Route::resource('services', ServiceController::class)->except(['index', 'show']);
    
    // Admin/Staff only pet actions
    Route::post('/pets/{pet}/approve', [PetController::class, 'approve'])->name('pets.approve');
    Route::post('/pets/{pet}/reject', [PetController::class, 'reject'])->name('pets.reject');
});

Route::middleware('auth')->group(function () {
    // Clients and Admins can manage pets (Controller handles specific permissions)
    Route::resource('pets', PetController::class);
    
    Route::resource('services', ServiceController::class)->only(['index', 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
