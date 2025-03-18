<?php
/**
 * Seeds (default/initial data) the database with packages.
 * * - Is called by DatabaseSeeder.php
 * * - Initialize before Course, Cluster, Unit & Timetable seeders.
 *
 * Filename:        PackageSeeder.php
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

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'id' => 1,
                "national_code" => "BSB",
                "title" => "Business Services Training Package",
                "tga_status" => "Current",
            ],
            [
                'id' => 2,
                "national_code" => "CUA",
                "title" => "Creative Arts and Culture Training Package",
                "tga_status" => "Current",
            ],
            [
                'id' => 3,
                "national_code" => "FNS",
                "title" => "Financial Services Training Package",
                "tga_status" => "Current",
            ],
            [
                'id' => 4,
                "national_code" => "ICT",
                "title" => "Information and Communications Technology",
                "tga_status" => "Current",
            ],
        ];

        $numRecords = count($seedData);
        $this->command->getOutput()->progressStart($numRecords);

        foreach ($seedData as $newPackage) {
            Package::create($newPackage);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
