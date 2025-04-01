<?php
/**
 * My custom helper functions.
 *  - Paste line below in file to use:
 *  require base_path("app/helpers/helpers.php");
 *  Functions: markdownToHtml(), assignableRoles(), assignableRolesNames().
 *
 *  Filename:        helpers.php
 *  Location:        app/helpers/
 * Project:         wits-2025-s1
 * Date Created:    21/03/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


/**
 * Provides formatting for the session flash.
 * - Supported Types: Info, Error, Warning, Success (case-insensitive)
 * @param  string  $type
 * @param  string  $message
 * @return array
 */
function formatFlash(string $type = 'info', string $message = ''): array
{
    $flashArr = [
        // "message" => "Something has happened.",
        "message" => $message,
        "icon" => "fa-solid fa-circle-info",
        "type" => "Info",
        "fgColour" => "text-white",
        "bgColour" => "bg-sky-600",
        "fgText" => "text-sky-900",
        "bgText" => "bg-sky-100",
    ];

    switch (strtolower($type)) {
        case 'error':
            // $flashArr['message'] = "You Are Not Authorized To Perform this Action";
            $flashArr['icon'] = "fa-solid fa-triangle-exclamation";
            $flashArr['type'] = "Error";
            // $flashArr['fgColour'] = "text-white";
            $flashArr['bgColour'] = "bg-red-600";
            $flashArr['fgText'] = "text-red-900";
            $flashArr['bgText'] = "bg-red-100";
            break;
        case 'warning':
            $flashArr['icon'] = "fa-solid fa-circle-exclamation";
            $flashArr['type'] = "Warning";
            // $flashArr['fgColour'] = "text-white";
            $flashArr['bgColour'] = "bg-amber-600";
            $flashArr['fgText'] = "text-amber-900";
            $flashArr['bgText'] = "bg-amber-100";
            break;
        case 'success':
            $flashArr['icon'] = "fa-solid fa-circle-check";
            $flashArr['type'] = "Success";
            // $flashArr['fgColour'] = "text-white";
            $flashArr['bgColour'] = "bg-green-600";
            $flashArr['fgText'] = "text-green-900";
            $flashArr['bgText'] = "bg-green-100";
            break;
    }

    return $flashArr;
}

// /**
//  * Returns array of names of roles that the current user can create/edit/delete.
//  *  - Gets any role whose name is listed in the permission of the current user's role.
//  * @return array
//  */
// function assignableRolesNames(): array
// {
//     // Get all permissions of current user's role.
//     $currentPermissions = Auth::user()->roles()->first()->permissions()->pluck('name')->toArray();
//     // Gets the names of all roles.
//     $allRoles = Role::all()->pluck('name')->toArray();
//     //$allRoles = ['Administrator', 'Staff', 'Client'];
//
//     // Gets any role whose name is listed in the permission of the current user's role.
//     return array_intersect($allRoles, $currentPermissions);
// }
//
// /**
//  * Returns array of Role objects that the current user can create/edit/delete.
//  *  - Calls assignableRolesNames().
//  * @return array
//  */
// function assignableRoles(): array
// {
//     $roleNames = assignableRolesNames();
//
//     $validRoles = [];
//     foreach ($roleNames as $roleName) {
//         $validRoles[] = Role::findByName($roleName, 'web');
//     }
//
//     return $validRoles;
// }

