<?php

/**
 * Timetable Add Test.
 * - Creates a test for adding timetables.
 * 
 * Filename:        TimetableAddTest.php
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
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimetableAddTest extends TestCase
{
    use RefreshDatabase;

    public function test_adding_timetable()
    {
        
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

        
        $timetableData = [
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'start_date' => '2025-05-12',
            'start_time' => '09:00',
            'session_duration' => 90,
            'lecturer_id' => $user->id,
        ];

       
        $response = $this->actingAs($user, 'sanctum')->post('/api/v1/timetables', $timetableData);


        $response->assertStatus(201);
        $response->assertJson(['message' => 'Timetable created successfully.']);
    }
}
