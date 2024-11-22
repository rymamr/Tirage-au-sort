<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\InterrogationController;
use App\Http\Controllers\AssurerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ma-page', function () {
    return view('ma-page');
});

Route::get('/schnaps', function () {
    return view('schnaps');
});

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
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('matieres', MatiereController::class);
Route::resource('cours', CoursController::class);
Route::resource('interrogations', InterrogationController::class);
Route::resource('assurer', AssurerController::class);


require __DIR__.'/auth.php';
