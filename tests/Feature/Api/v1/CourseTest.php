<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{actingAs, postJson, getJson, putJson, deleteJson};
use App\Models\Course;
use App\Models\User;
use App\Models\Cluster;
use App\Models\Unit;
use App\Models\Package;

uses(RefreshDatabase::class);

beforeEach(function () {
    $testCourses = [
        [
            // "id" => "10001",
            "package_id" => "1",
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
            "package_id" => "1",
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
            "package_id" => "1",
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
            "package_id" => "2",
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
            "package_id" => "3",
            "national_code" => "TEST0215",
            "aqf_level" => "Advanced Diploma of",
            "title" => "Testing",
            "tga_status" => "Current",
            "state_code" => "TTT6",
            "nominal_hours" => "385",
            "type" => "Qualification"
        ],
    ];
    $testUser = User::create([
        'given_name' => 'Corin',
        'family_name' => 'Little',
        'email' => 'corin@example.com',
        'password' => 'Password1',
    ]);

    // $this->user = User::factory()->create();
    // $this->user->assignRole('Admin');
    // $this->actingAs($this->user);
    // $this->actingAs($this->user, 'sanctum')->get('/api/v1/courses');
    $this->actingAs($testUser, 'sanctum');

    // Course::factory()->count(1)->create();
    foreach ($testCourses as $newCourse) {
        Course::create($newCourse);
    }

});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('Browse All Courses', function () {
    getJson('/api/v1/courses')
        ->assertOk()
        ->assertJsonFragment([
            'success' => true,
            'message' => 'Found all '. Course::count() .' courses',
        ])
        ->assertJsonStructure([
            'data' => [['id', 'national_code', 'aqf_level', 'title', 'tga_status', 'state_code', 'nominal_hours']],
        ]);
    // $response = $this->get('/');
    //
    // $response->assertStatus(200);
});
