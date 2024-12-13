<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\AssurerController;
use App\Http\Controllers\TirageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/tirage', [TirageController::class, 'showTirageForm'])->name('tirage.form');
Route::post('/tirage', [TirageController::class, 'tirage'])->name('tirage');

Route::get('/tirage', function () {
    return view('tirage.index'); // Page générique
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cours/{id}/tirage', [TirageController::class, 'tirage']);
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', UserController::class);
Route::resource('classes', ClasseController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('matieres', MatiereController::class);
Route::resource('cours', CourController::class);
Route::resource('assurer', AssurerController::class);


require __DIR__.'/auth.php';
