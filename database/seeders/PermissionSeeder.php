<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    // Array of all permissions that can be assigned to a role.
    private $permissions = [
        // User Permissions
        'system configuration', 'manage roles', 'manage domains', 'user management',
        'backup management', 'import/export',
        'class session management', 'approve changes', 'view all class sessions', 'view own class sessions',
        'edit own profile', 'request changes',

        // Course Permissions
        'course browse', 'course read', 'course add', 'course edit', 'course delete',

        // TODO: Add permissions for Package, Cluster, Unit, Timetable & etc
        // Package Permissions
        'package browse', 'package read', 'package add', 'package edit', 'package delete',

        // Cluster Permissions

        // Unit Permissions

        // Timetable Permissions
        'timetable browse', 'timetable read', 'timetable add', 'timetable edit', 'timetable delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create each of the permissions ready for role creation
        foreach ($this->permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
