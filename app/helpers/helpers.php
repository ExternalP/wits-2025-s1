<?php
/**
 * My custom helper functions.
 *  - Paste line below in file to use:
 *  require base_path("app/helpers/helpers.php");
 *  Functions: cleanCourseRequest().
 *
 *  Filename:        helpers.php
 *  Location:        app/helpers/
 * Project:         wits-2025-s1
 * Date Created:    21/03/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */

use App\Http\Requests\v1\StoreCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;


/**
 * Cleans the API request for Course.
 * @param array $request
 * @return array
 */
function cleanCourseRequest(array $request): array
{
    // $request['national_code'] = strtoupper($request['national_code']);
    // $request['state_code'] = strtoupper($request['state_code']);
    if (isset($request['national_code'])) {
        $request['national_code'] = strtoupper($request['national_code']);
    }
    if (isset($request['state_code'])) {
        $request['state_code'] = strtoupper($request['state_code']);
    }
    if (!isset($request['cluster_id'])) {
        $request['cluster_id'] = [];
    }
    if (!isset($request['unit_id'])) {
        $request['unit_id'] = [];
    }

    return $request;
}
