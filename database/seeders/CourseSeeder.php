<?php
/**
 * Seeds (default/initial data) the database with courses from a csv.
 * - Is called by DatabaseSeeder.php
 * - PackageSeeder.php must be initialized first due to foreign key.
 *
 * Filename:        CourseSeeder.php
 * Location:        database/seeders/
 * Project:         wits-2025-s1
 * Date Created:    25/02/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 * Student ID:      20135656
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart();

        Course::truncate();

        // $filePath = storage_path('/app/private/Course_2_v2.csv');
        $filePath = storage_path('/app/private/Course_2_Duplicates_Removed.csv');

        $csvFile = fopen($filePath, 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Course::create([
                    'id' => $data['0'],
                    'package_id' => $data['1'],
                    'national_code' => $data['2'],
                    'aqf_level' => $data['3'],
                    'title' => $data['4'],
                    'tga_status' => $data['5'],
                    'state_code' => $data['6'],
                    'nominal_hours' => $data['7'],
                    'type' => $data['8'],
                ]);
            }
            $firstline = false;

            $this->command->getOutput()->progressAdvance();
        }
        fclose($csvFile);

        $this->command->getOutput()->progressFinish();
    }
}
