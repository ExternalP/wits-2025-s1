<?php

/**
 * Timetable Edit Test.
 * - Creates a test for editing timetables.
 * 
 * Filename:        TimetableEditTest.php
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

class TimetableEditTest extends TestCase
{
    use RefreshDatabase;

    private function initializeRolesPermissions(): void {
        $permissions = [
            'timetable browse', 'timetable read', 'timetable add', 'timetable edit', 'timetable delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'Admin']);
        $admin->syncPermissions($permissions);
    }

    public function test_updating_timetable()
    {
        $this->initializeRolesPermissions();

        $package = Package::create([
            'national_code' => 'ABC123',
            'title' => 'Test Package',
            'tga_status' => 'Current',
        ]);

        $user = User::create([
            'given_name' => 'Luis',
            'family_name' => 'Alvarez',
            'email' => 'luis.alvarez@example.org',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Admin');

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

        $timetable = Timetable::create([
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'start_date' => '2025-05-12',
            'start_time' => '09:00',
            'session_duration' => 90,
            'lecturer_id' => $user->id,
        ]);

        $updatedData = [
            'start_time' => '10:30',
            'session_duration' => 120,
        ];

        $response = $this->actingAs($user, 'sanctum')->put("/api/v1/timetables/{$timetable->id}", $updatedData);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Timetable updated successfully.']);
        $this->assertDatabaseHas('timetables', [
            'id' => $timetable->id,
            'start_time' => '10:30',
        ]);
    }
}
