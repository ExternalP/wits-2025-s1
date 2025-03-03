<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'system configuration']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage domains']);
        Permission::create(['name' => 'user management']);
        Permission::create(['name' => 'backup management']);
        Permission::create(['name' => 'import/export']);

        Permission::create(['name' => 'class session management']);
        Permission::create(['name' => 'approve changes']);
        Permission::create(['name' => 'view all class sessions']);
        Permission::create(['name' => 'view own class sessions']);

        Permission::create(['name' => 'edit own profile']);
        Permission::create(['name' => 'request changes']);
    }
}
