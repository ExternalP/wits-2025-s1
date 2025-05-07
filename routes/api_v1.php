<?php
/**
 * Version 1 API Routes table.
 * - First versioned routes table.
 *
 * Filename:        api_v1.php
 * Location:        routes/
 * Project:         wits-2025-s1
 * Date Created:    22/04/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 * Student ID:      20135656
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\PackageController;
use App\Http\Controllers\Api\v1\CourseController;
use App\Http\Controllers\Api\v1\ClusterController;
use App\Http\Controllers\Api\v1\UnitController;

/** User API Routes */
Route::apiResource('users', UserController::class);

/** Packages API Routes */
Route::apiResource('packages', PackageController::class);

/** Courses API Routes */
Route::apiResource('courses', CourseController::class);

/** Clusters API Routes */
Route::apiResource('clusters', ClusterController::class);

/** Units API Routes */
Route::apiResource('units', UnitController::class);



