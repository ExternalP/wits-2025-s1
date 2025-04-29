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
        // Asegúrate de que tengas al menos 1 curso, cluster y docente para la referencia
        $course = Course::first(); // Asume que ya hay cursos en la base de datos
        $cluster = Cluster::first(); // Asume que ya hay clusters en la base de datos
        $lecturer = User::first(); // Asume que ya hay docentes en la base de datos

        // Insertar datos de ejemplo en la tabla timetables
        Timetable::create([
            'course_id' => $course->id,
            'cluster_id' => $cluster->id,
            'lecturer_id' => $lecturer->id,
            'start_date' => '2025-05-01',
            'end_date' => '2025-05-31',
            'start_time' => '09:00:00',
            'session_duration' => 90, // Duración de la sesión en minutos
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
