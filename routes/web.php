<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClusterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\StaticController::class, 'home'])->name('welcome');
Route::get('/about', [\App\Http\Controllers\StaticController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\StaticController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('clusters', \App\Http\Controllers\ClusterController::class);

Route::get('/clusters', [\App\Http\Controllers\ClusterController::class, 'index'])->name('clusters.index');
Route::get('/clusters/{id}', [\App\Http\Controllers\ClusterController::class, 'show'])->name('clusters.show');
Route::get('/clusters/{id}/edit', [\App\Http\Controllers\ClusterController::class, 'edit'])->name('clusters.edit');
Route::delete('/clusters/{id}', [UserController::class, 'destroy'])->name('clusters.destroy');



Route::middleware('auth')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class)->except(['index', 'show', 'edit', 'update', 'create', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
