<?php
/**
 * Testing for Packages BREAD functionality and roles/permissions authentication.
 * - php artisan test --filter=PackagesTest
 *
 * Filename:        PackagesTest.php
 * Location:        tests/Feature/Api/v1/
 * Project:         wits-2025-s1
 * Date Created:    25/6/2025
 *
 * Author:          Tadiwanashe Gukwa <20095319@tafe.wa.edu.au>
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

class PackagesTest extends TestCase
{
    // Clears/empties the database;
    use RefreshDatabase;

    private $course, $packages, $user, $user2, $cluster, $unit;

    private function initializeTestDatabase(): void


    {
        $this->initializeRolesPermissions();

        $this->user = User::create([
            'given_name' => 'Mike',
            'family_name' => 'Johnson',
            'email' => 'mike@example.com',
            'password' => bcrypt('Password1'),
        ]);
        $this->user->assignRole('Admin');

        $this->user2 = User::create([
            'given_name' => 'Adrian',
            'family_name' => 'Gould',
            'email' => 'adrian@example.com',
            'password' => bcrypt('Password1'),
        ]);
        $this->user2->assignRole('Student');

//        $this->package = Package::create([
//            'national_code' => 'PAC123',
//            'title' => 'Test Package',
//            'tga_status' => 'Current',
//        ]);
        $this->packages = Package::factory()->count(10)->create();

        $this->course = Course::factory()->create();

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

    }


    private function initializeRolesPermissions(): void {
        // Package Permissions
        $permissions = [
            'package browse', 'package read', 'package add', 'package edit', 'package delete',
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
            'package browse', 'package read', 'package add', 'package edit', 'package delete',
        ]);

        $staff->syncPermissions([
            'package browse', 'package read', 'package add',

        ]);

        $student->syncPermissions([
            'package browse', 'package read',
        ]);
    }

    /**
     * Displays a list of all packages.
     * @return void
     */
    public function test_browse_packages()
    {
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->user, 'sanctum')->get('/api/v1/packages');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'success' => true,
            'message' => 'Found all '. Package::count() .' packages',
        ]);
        $response->assertJsonStructure([
            'data' => [["id", "national_code", "title", "tga_status", "created_at", "updated_at"]],
        ]);
    }

    /**
     * Display a package's details.
     * @param  int  $id
     * @return void
     */
    public function test_show_package(int $id = 1)
    {
        $this->initializeTestDatabase();

        $response = $this->actingAs($this->user, 'sanctum')->get('/api/v1/packages/'.$id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
           /* 'success' => true,*/
            'message' => 'Package Found',
        ]);
        $response->assertJsonStructure([
            'data' => ["id", "national_code", "title", "tga_status", "created_at", "updated_at"]
        ]);

    }

    /**
     * Create a new Package & store it in the database.
     * @return void
     */
    public function test_store_package()
    {
        $this->initializeTestDatabase();

        $newPackage = [

            'national_code' => "g432" ,
            'title' => "datascience",
            'tga_status' => "current",
        ];

        $response = $this->actingAs($this->user, 'sanctum')->post('/api/v1/packages/', $newPackage);
        $response->assertStatus(201);
        $response->assertJsonFragment([

            'message' => 'Package created',
        ]);
        $response->assertJsonStructure([
            'data' => ["id", "national_code", "title", "tga_status", "created_at", "updated_at"],
        ]);
    }

    /**
     * Update the specified Package in the database.
     * @return void
     */
    public function test_update_package()
    {
        $this->initializeTestDatabase();

        $updatePackage = Package::latest()->first();

        $newPackage = [
            "national_code" => "NOT00000",
            "title" => "Not Testing",
            "cluster_id" => [1],
            "unit_id" => [1],
        ];

        $response = $this->actingAs($this->user, 'sanctum')->patch('/api/v1/packages/'.$updatePackage->id, $newPackage);

        $response->assertStatus(201);
        $response->assertJsonFragment([

            'message' => 'Package updated successfully',
        ]);
        $response->assertJsonStructure([
            'data' => ["id", "national_code", "title", "tga_status", "created_at", "updated_at"],
        ]);

    }

    /**
     * Remove a Pckage from the database.
     * @return void
     */
    public function test_destroy_package()
    {
        $this->initializeTestDatabase();

        $package = Package::first();

        $response = $this->actingAs($this->user, 'sanctum')->delete('/api/v1/packages/'.$package->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([

        ]);
        $response->assertJsonStructure([
            'data' => [],
        ]);
        $this->assertDatabaseMissing('packages', ['id' => $package->id]);
    }

    /**
     * Stops user without the correct permissions from removing a package from the database.
     * @return void
     */
    public function test_package_permissions()
    {
        $this->initializeTestDatabase();

        $package = Package::first();

        $response = $this->actingAs($this->user2, 'sanctum')->delete('/api/v1/packages/'.$package->id);

        $response->assertStatus(403);
        $response->assertJsonFragment([

            'message' => "You are not authorised to delete these packages",
        ]);
        $this->assertDatabaseHas('packages', ['id' => $package->id]);
    }
}
