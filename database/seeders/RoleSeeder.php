<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $admin = Role::create(['name' => 'Admin']);
        $staff = Role::create(['name' => 'Staff']);
        $student = Role::create(['name' => 'Student']);

        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'manage domains',
            'user management',
            'backup management',
            'import/export',
            'class session management',
            'approve changes',
            'view all class sessions',
            'view own class sessions',
            'edit own profile',
            'request changes',
        ]);

        $staff->givePermissionTo([
            'class session management',
            'approve changes',
            'view own class sessions',
            'edit own profile',
            'request changes',
        ]);

        $student->givePermissionTo([
            'edit own profile',
            'request changes',
        ]);

    }
}
