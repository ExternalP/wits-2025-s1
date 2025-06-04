<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TimetableController;

require __DIR__.'/auth.php';

// Static routes
Route::get('/', [StaticController::class, 'home'])->name('welcome');
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class)->except(['index', 'show']);  // Remove index, show for user resources
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('units', UnitController::class);

Route::resource('users', UserController::class);
Route::resource('clusters', ClusterController::class);

Route::get('/clusters', [ClusterController::class, 'index'])->name('clusters.index');
Route::get('/clusters/{id}', [ClusterController::class, 'show'])->name('clusters.show');
Route::get('/clusters/{id}/edit', [ClusterController::class, 'edit'])->name('clusters.edit');
Route::delete('/clusters/{id}', [UserController::class, 'destroy'])->name('clusters.destroy');

// Course routes for browse, show
Route::get('courses', [CourseController::class, 'index'])
    ->name('courses.index');
// Wild card {id} is constrained in AppServiceProvider.boot()
Route::get('courses/{id}', [CourseController::class, 'show'])
    ->name('courses.show');

// Route::middleware('auth')->group(function () {
//     Route::resource('users', UserController::class)->except(['index', 'show', 'edit', 'update', 'create', 'destroy']);
// });

Route::middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class)
        ->except(['index', 'show']);
});

Route::resource('packages', PackageController::class)

    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);
Route::get('/packages/search', [PackageController::class, 'search'])->name('packages.search');



//Timetables


Route::middleware('auth')->group(function () {
    Route::resource('timetables', TimetableController::class)
        ->only(['create', 'index',  'store', 'edit', 'update', 'destroy', 'show']);
});