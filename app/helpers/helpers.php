<?php
/**
 * My custom helper functions.
 *  - Paste line below in file to use:
 *  require base_path("app/helpers/helpers.php");
 *  Functions: assignableRoles(), assignableRolesNames().
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

