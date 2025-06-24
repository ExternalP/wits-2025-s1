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

        $superAdmin->syncPermissions(Permission::all());

        $admin->syncPermissions([
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
            'course browse', 'course read', 'course add', 'course edit', 'course delete',
            'timetable browse', 'timetable read', 'timetable add', 'timetable edit', 'timetable delete'
        ]);

        $staff->syncPermissions([
            'class session management',
            'approve changes',
            'view own class sessions',
            'edit own profile',
            'request changes',
            'course browse', 'course read', 'course add',
            'timetable browse','timetable read', 'timetable add'
            
        ]);

        $student->syncPermissions([
            'edit own profile',
            'request changes',
            'course browse', 'course read',
            'timetable browse','timetable read'
        ]);

    }
}
