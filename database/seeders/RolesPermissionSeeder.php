<?php

// /**
// * Assessment Title: WITS-2025-S1
//  * Cluster:          SaaS: Part 2 – Back End Development
//  * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
//  * Name:             Luis Alvarez Suarez
//  * Student ID:       20114831
//  * Year/Semester:    2024/S2
//  *
//  * RolesPermissionsSeeder
//  *
//  * Creates Roles Permissions.
//  *
//  * Filename:        RolesPermissionsSeeder.php
//  * Location:        database/seeders
//  * Project:         WITS-2025-S1
//  * Date Created:    28/10/2024
//  *
//  * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
//  *
//  */
// namespace Database\Seeders;
//
// use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
//
// class RolesPermissionSeeder extends Seeder
// {
//     /**
//      * Run the seeder
//      */
//     public function run()
//     {
//         $permissions = [
//
//             ['name' => 'system configuration', 'guard_name' => 'web'],
//             ['name' => 'manage roles', 'guard_name' => 'web'],
//             ['name' => 'manage domains', 'guard_name' => 'web'],
//             ['name' => 'user management', 'guard_name' => 'web'],
//             ['name' => 'backup management', 'guard_name' => 'web'],
//             ['name' => 'import/export', 'guard_name' => 'web'],
//             ['name' => 'class session management', 'guard_name' => 'web'],
//             ['name' => 'approve changes', 'guard_name' => 'web'],
//             ['name' => 'view all class sessions', 'guard_name' => 'web'],
//             ['name' => 'view own class sessions', 'guard_name' => 'web'],
//             ['name' => 'edit own profile', 'guard_name' => 'web'],
//             ['name' => 'request changes', 'guard_name' => 'web'],
//         ];
//
//         foreach ($permissions as $permission) {
//             Permission::firstOrCreate($permission);
//         }
//
//         // SuperAdmin Role
//         $superAdmin = Role::firstOrCreate(['name' => 'SuperAdmin', 'guard_name' => 'web']);
//         $superAdmin->syncPermissions(Permission::all());
//
//         // Admin Role
//         $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
//         $admin->syncPermissions([
//             'system configuration', 'manage roles', 'manage domains',
//             'user management', 'backup management', 'import/export',
//             'class session management', 'approve changes',
//             'view all class sessions', 'view own class sessions',
//             'edit own profile', 'request changes'
//         ]);
//
//         // Staff Role
//         $staff = Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);
//         $staff->syncPermissions([
//             'class session management', 'approve changes',
//             'view all class sessions', 'view own class sessions',
//             'edit own profile', 'request changes'
//         ]);
//
//         // Student Role
//         $student = Role::firstOrCreate(['name' => 'Student', 'guard_name' => 'web']);
//         $student->syncPermissions([
//             'view own class sessions',
//             'edit own profile', 'request changes'
//         ]);
//     }
// }
