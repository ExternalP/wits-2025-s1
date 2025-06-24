<?php

/**
 * Timetable Browse Test.
 * - Creates a test for browsing timetables.
 *
 * Filename:        TimetableBrowseTest.php
 * Location:        tests/Feature/Api/Timetable/V1
 * Project:         wits-2025-s1
 * Date Created:    22/04/2025
 *
 * Author:          Luis Alvarez<20114831@tafe.wa.edu.au>
 * Student ID:      20114831
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

namespace Tests\Feature\Api\Timetable\V1;

use App\Models\Package;
use App\Models\User;
use App\Models\Course;
use App\Models\Cluster;
use App\Models\Timetable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TimetableBrowseTest extends TestCase
{
    use RefreshDatabase;

    private function initializeRolesPermissions(): void {
        $permissions = [
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
            'timetable browse', 'timetable read', 'timetable add', 'timetable edit', 'timetable delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

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

        // $user->assignRole(Role::where('name', 'Admin')->first());
        // $user->assignRole('Admin');
    }

    public function test_browsing_timetables()
    {
        $this->initializeRolesPermissions();

        $user = User::create([
            'given_name' => 'Luis',
            'family_name' => 'Alvarez',
            'email' => 'luis.alvarez@example.org',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Admin');

        $package = Package::create([
            'national_code' => 'ABC123',
            'title' => 'Test Package',
            'tga_status' => 'Current',
        ]);

        $course = Course::create([
            'national_code' => 'A123',
            'aqf_level' => '5',
            'title' => 'Course Title',
            'state_code' => 'AZN5',
            'nominal_hours' => 665,
            'type' => 'Qualification',
            'package_id' => $package->id,
        ]);

        $cluster = Cluster::create([
            'code' => 'ADVPROG',
            'title' => 'Advanced Programming',
            'qualification' => 'ICT50220',
            'state_code' => 'AC21',
        ]);

        Timetable::create([
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'start_date' => '2025-05-12',
            'start_time' => '09:00',
            'session_duration' => 90,
            'lecturer_id' => $user->id,
        ]);


        $response = $this->actingAs($user, 'sanctum')->get('/api/v1/timetables');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'course_id', 'cluster_id', 'start_date', 'start_time', 'session_duration', 'lecturer_id']
        ]);
    }
}
