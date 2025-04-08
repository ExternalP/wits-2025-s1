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
        //'course browseTrash', 'course restore', 'course permanentDelete',

        // TODO: Add permissions for Package, Cluster, Unit, Timetable & etc
        // Package Permissions

        // Cluster Permissions

        // Unit Permissions
        
        // Timetable Permissions
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

        // Permission::create(['name' => 'system configuration']);
        // Permission::create(['name' => 'manage roles']);
        // Permission::create(['name' => 'manage domains']);
        // Permission::create(['name' => 'user management']);
        // Permission::create(['name' => 'backup management']);
        // Permission::create(['name' => 'import/export']);
        //
        // Permission::create(['name' => 'class session management']);
        // Permission::create(['name' => 'approve changes']);
        // Permission::create(['name' => 'view all class sessions']);
        // Permission::create(['name' => 'view own class sessions']);
        //
        // Permission::create(['name' => 'edit own profile']);
        // Permission::create(['name' => 'request changes']);
    }
}
