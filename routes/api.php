<?php
/**
 * General API Routes table.
 * - Uses API versioning so for latest routes go to api_v*.php.
 *
 * Filename:        api.php
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

use App\Classes\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(base_path('routes/api_v1.php'));

/**
 * Fallback to 404
 */
Route::fallback(static function(){
    return ApiResponse::error(
        [],
        "Page Not Found. If error persists, contact info@website.com",
        404
    );
});
