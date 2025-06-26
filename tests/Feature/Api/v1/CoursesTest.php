<?php
/**
 * Testing for Courses BREAD functionality and roles/permissions authentication.
 * - php artisan test --filter=CoursesTest
 *
 * Filename:        CoursesTest.php
 * Location:        tests/Feature/Api/v1/
 * Project:         wits-2025-s1
 * Date Created:    17/6/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */

namespace Api\v1;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

    private $courses, $package, $users, $cluster, $unit;

    /**
     * Seeds the database with some initial data for testing.
     * - Isn't a constructor so can test with an empty database.
     * @return void
     */
    private function initializeTestDatabase(): void
    {
        $this->initializeRolesPermissions();

        $this->users[] = User::create([
            'given_name' => 'Corin',
            'family_name' => 'Little',
            'email' => 'corin@example.com',
            'password' => bcrypt('Password1'),
        ]);
        $this->users[0]->assignRole('Admin');

        $this->users[] = User::create([
            'given_name' => 'Adrian',
            'family_name' => 'Gould',
            'email' => 'adrian@example.com',
            'password' => bcrypt('Password1'),
        ]);
        $this->users[1]->assignRole('Student');

        $this->package = Package::create([
            'national_code' => 'PAC123',
            'title' => 'Test Package',
            'tga_status' => 'Current',
        ]);

        // Creates 10 courses.
        $this->courses = Course::factory()->count(10)->create();

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
     * Initializes roles and permissions for courses.
     * - Is called in initializeTestDatabase() for assigning roles to the test users.
     * @return void
     */
    private function initializeRolesPermissions(): void {
        // Course Permissions
        $permissions = [
            'course browse', 'course read', 'course add', 'course edit', 'course delete',
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
            'course browse', 'course read', 'course add', 'course edit', 'course delete',
        ]);

        $staff->syncPermissions([
            'course browse', 'course read', 'course add',

        ]);

        $student->syncPermissions([
            'course browse', 'course read',
        ]);

        // $users[0]->assignRole(Role::where('name', 'Admin')->first());
        // $users[0]->assignRole('Admin');
    }

    /**
     * Displays a list of all courses.
     * @return void
     */
    public function test_browse_courses()
    {
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->users[0], 'sanctum')->get('/api/v1/courses');

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

        $response = $this->actingAs($this->users[0], 'sanctum')->get('/api/v1/courses/'.$id);

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

        $newCourse = [
            "package_id" => $this->package->id,
            "national_code" => "TEST9999",
            "aqf_level" => "Graduate Certificate In",
            "title" => "Tested",
            "state_code" => "TTT9",
        ];

        $response = $this->actingAs($this->users[0], 'sanctum')->post('/api/v1/courses/', $newCourse);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Course added',
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);
        $this->assertDatabaseHas('courses', [
            "package_id" => $this->package->id,
            "national_code" => "TEST9999",
            "aqf_level" => "Graduate Certificate In",
            "title" => "Tested",
            "state_code" => "TTT9",
        ]);
    }

    /**
     * Update the specified course in the database.
     * @return void
     */
    public function test_update_course()
    {
        $this->initializeTestDatabase();

        $course = Course::latest()->first();

        $updateFields = [
            // "package_id" => $this->package->id,
            "national_code" => "NOT00000",
            // "aqf_level" => "Graduate Certificate In",
            "title" => "Not Testing",
            // "state_code" => "NOT0",
            "cluster_id" => [1],
            "unit_id" => [1],
        ];

        $response = $this->actingAs($this->users[0], 'sanctum')->patch('/api/v1/courses/'.$course->id, $updateFields);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Course updated',
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);
        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            // "package_id" => $this->package->id,
            "national_code" => "NOT00000",
            // "aqf_level" => "Graduate Certificate In",
            "title" => "Not Testing",
            // "state_code" => "NOT0",
        ]);
        $this->assertDatabaseHas('course_cluster', [
            'course_id' => $course->id,
            "cluster_id" => 1,
        ]);
        $this->assertDatabaseHas('course_unit', [
            'course_id' => $course->id,
            "unit_id" => 1,
        ]);
    }

    /**
     * Remove a course from the database.
     * @return void
     */
    public function test_destroy_course()
    {
        $this->initializeTestDatabase();

        $course = Course::first();

        $response = $this->actingAs($this->users[0], 'sanctum')->delete('/api/v1/courses/'.$course->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'success' => true,
            'message' => "Course '$course->aqf_level $course->title' deleted",
        ]);
        $response->assertJsonStructure([
            'data' => ['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours'],
        ]);
        $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    }

    /**
     * Stops user without the correct permissions from removing a course from the database.
     * @return void
     */
    public function test_course_permissions()
    {
        $this->initializeTestDatabase();

        $course = Course::first();

        // user[1] is a student and doesn't have permission to delete courses.
        $response = $this->actingAs($this->users[1], 'sanctum')->delete('/api/v1/courses/'.$course->id);

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'success' => false,
            'message' => "You are not authorised to delete this course.",
        ]);
        $this->assertDatabaseHas('courses', ['id' => $course->id]);
    }
}
