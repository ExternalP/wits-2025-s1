<?php
/**
 * DESCRIPTION_BUT_EACH_LINE_HAS_MAX_LENGTH_OF_96_CHARACTERS
 *
 * Filename:        CoursesTest.php
 * Location:        FILE_LOCATION
 * Project:         wits-2025-s1
 * Date Created:    17/6/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */

namespace Api\v1;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;
use App\Models\User;
use App\Models\Cluster;
use App\Models\Unit;
use App\Models\Package;

class CoursesTest extends TestCase
{
    use RefreshDatabase;

    private $courses, $package, $user, $cluster, $unit;

    private function initializeTestDatabase()
    {
        $this->user = User::create([
            'given_name' => 'Corin',
            'family_name' => 'Little',
            'email' => 'corin@example.com',
            'password' => bcrypt('Password1'),
        ]);

        $this->package = Package::create([
            'national_code' => 'PAC123',
            'title' => 'Test Package',
            'tga_status' => 'Current',
        ]);

        $courseData = [
            [
                // "id" => "10001",
                "package_id" => $this->package->id,
                "national_code" => "TEST0115",
                "aqf_level" => "Certificate I in",
                "title" => "Testing",
                "tga_status" => "Current",
                "state_code" => "TTT7",
                "nominal_hours" => "150",
                "type" => "Qualification"
            ],
            [
                // "id" => "10002",
                "package_id" => $this->package->id,
                "national_code" => "TEST0115",
                "aqf_level" => "Certificate II in",
                "title" => "Testing",
                "tga_status" => "Current",
                "state_code" => "TTT8",
                "nominal_hours" => "325",
                "type" => "Qualification"
            ],
            [
                // "id" => "10003",
                "package_id" => $this->package->id,
                "national_code" => "TEST0215",
                "aqf_level" => "Certificate III in",
                "title" => "Testing",
                "tga_status" => "Current",
                "state_code" => "TTT9",
                "nominal_hours" => "385",
                "type" => "Qualification"
            ],
            [
                // "id" => "10004",
                "package_id" => $this->package->id,
                "national_code" => "TEST0115",
                "aqf_level" => "Certificate IV in",
                "title" => "Testing",
                "tga_status" => "Current",
                "state_code" => "TTT7",
                "nominal_hours" => "420",
                "type" => "Qualification"
            ],
            [
                // "id" => "10005",
                "package_id" => $this->package->id,
                "national_code" => "TEST0215",
                "aqf_level" => "Advanced Diploma of",
                "title" => "Testing",
                "tga_status" => "Current",
                "state_code" => "TTT6",
                "nominal_hours" => "385",
                "type" => "Qualification"
            ],
        ];
        foreach ( $courseData as $newCourse) {
            $this->courses[] = Course::create($newCourse);
        }

        $this->cluster = Cluster::create([
            'code' => 'CLUSTER',
            'title' => 'Advanced Clustering',
            'qualification' => 'CLU9999',
            'state_code' => 'CLU9',
        ]);

        $this->unit = Unit::create([
            'national_code' => 'UNIT999',
            'title' => 'A Unit',
            'tga_status' => 'Current',
            'state_code' => 'UUU1',
            'nominal_hours' => 99,
        ]);


        $this->courses[0]->clusters()->attach([1]);
        $this->courses[0]->units()->attach([1]);
        $this->courses[2]->clusters()->attach([1]);
        $this->courses[3]->units()->attach([1]);
    }

    public function test_browse_courses()
    {
        // $package = Package::create([
        //     'national_code' => 'ABC123',
        //     'title' => 'Test Package',
        //     'tga_status' => 'Current',
        // ]);

        // $user = User::create([
        //     'given_name' => 'Corin',
        //     'family_name' => 'Little',
        //     'email' => 'corin@example.com',
        //     'password' => bcrypt('Password1'),
        // ]);

        // $course = Course::create([
        //     'national_code' => 'TEST123',
        //     'aqf_level' => '5',
        //     'title' => 'Course Title',
        //     'state_code' => 'TTT5',
        //     'nominal_hours' => 999,
        //     'type' => 'Qualification',
        //     'package_id' => $this->package->id,
        // ]);

        // $cluster = Cluster::create([
        //     'code' => 'ADVPROG',
        //     'title' => 'Advanced Programming',
        //     'qualification' => 'ICT50220',
        //     'state_code' => 'AC21',
        // ]);

        // $unit = Unit::create([
        //     'national_code' => 'UNIT123',
        //     'title' => 'Test Unit',
        //     'tga_status' => 'Current',
        //     'state_code' => 'UUU1',
        //     'nominal_hours' => 99,
        // ]);
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->user, 'sanctum')->get('/api/v1/courses');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours']],
        ]);
    }
}
