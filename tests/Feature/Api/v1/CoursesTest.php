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
    // Clears/empties the database;
    use RefreshDatabase;

    private $courses, $package, $user, $cluster, $unit;

    /**
     * Seeds the database with some initial data for testing.
     * - Isn't a constructor so can test with an empty database.
     * @return void
     */
    private function initializeTestDatabase(): void
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

        // Creates 10 courses.
        $this->courses = Course::factory()->count(10)->create();
        // Data for 5 courses.
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
        // foreach ( $courseData as $newCourse) {
        //     $this->courses[] = Course::create($newCourse);
        // }

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

    /**
     * Displays a list of all courses.
     * @return void
     */
    public function test_browse_courses()
    {
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->user, 'sanctum')->get('/api/v1/courses');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'success' => true,
            // message will change if using a search or filter.
            'message' => 'Found all '. Course::count() .' courses',
        ]);
        $response->assertJsonStructure([
            'data' => [['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours']],
        ]);
    }

    /**
     * Display a course's details.
     * @param  int  $id
     * @return void
     */
    public function test_show_course(int $id = 1)
    {
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->user, 'sanctum')->get('/api/v1/courses/'.$id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Course found',
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);
    }

    /**
     * Create a new course & store it in the database.
     * @return void
     */
    public function test_store_course()
    {
        $this->initializeTestDatabase();

        // $this->courses[] = Course::create([
        $newCourse = [
            "package_id" => $this->package->id,
            "national_code" => "TEST9999",
            "aqf_level" => "Graduate Certificate In",
            "title" => "Tested",
            "state_code" => "TTT9",
        ];

        $response = $this->actingAs($this->user, 'sanctum')->post('/api/v1/courses/', $newCourse);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Course added',
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);
    }

    /**
     * Update the specified course in the database.
     * @return void
     */
    public function test_update_course()
    {
        $this->initializeTestDatabase();

        $updateCourse = Course::latest()->first();

        $newCourse = [
            // "package_id" => $this->package->id,
            "national_code" => "NOT00000",
            // "aqf_level" => "Graduate Certificate In",
            "title" => "Not Testing",
            // "state_code" => "NOT0",
            "cluster_id" => [1],
            "unit_id" => [1],
        ];

        $response = $this->actingAs($this->user, 'sanctum')->patch('/api/v1/courses/'.$updateCourse->id, $newCourse);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Course updated',
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);

        // $response = $this->actingAs($user, 'sanctum')->put("/api/v1/timetables/{$timetable->id}", $updatedData);
        //
        // $response->assertStatus(200);
        // $response->assertJson(['message' => 'Timetable updated successfully.']);
        // $this->assertDatabaseHas('timetables', [
        //     'id' => $timetable->id,
        //     'start_time' => '10:30',
        // ]);
    }
}
