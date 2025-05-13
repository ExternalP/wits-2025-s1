<?php

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
