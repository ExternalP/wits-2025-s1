<?php
/**
 * Timetable Seeder.
 * - Seeds sample data for timetable.
 * 
 * Filename:        TimetableSeeder.php
 * Location:        database/seeders
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


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timetable;
use App\Models\Course;
use App\Models\Cluster;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    public function run()
    {
        
        $course = Course::first(); 
        $cluster = Cluster::first(); 
        $lecturer = User::first(); 

        
        Timetable::create([
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'lecturer_id' => $lecturer->id,
            'start_date' => '2025-05-01',
            'end_date' => '2025-05-31',
            'start_time' => '09:00:00',
            'session_duration' => 90, 
        ]);

       
        Timetable::create([
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'lecturer_id' => $lecturer->id,
            'start_date' => '2025-06-01',
            'end_date' => '2025-06-30',
            'start_time' => '14:00:00',
            'session_duration' => 120,
        ]);
    }
}
