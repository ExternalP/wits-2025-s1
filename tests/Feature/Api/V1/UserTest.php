<?php

namespace Tests\Feature\Api\V1;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        $roles = ['SuperAdmin', 'Admin', 'Staff', 'Student'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $this->authUser = User::factory()->create([
            'given_name' => 'Admin',
            'family_name' => 'User',
            'email' => 'admin@example.com',
        ]);
        $this->authUser->assignRole('SuperAdmin');
        Sanctum::actingAs($this->authUser, ['*']);
    }

    // Test browse users
    public function test_browse_users()
    {
        // Create some test users with roles
        $users = User::factory()->count(3)->create();
        $users[0]->assignRole('Student');
        $users[1]->assignRole('Staff');
        $users[2]->assignRole('Admin');

        $response = $this->actingAs($this->authUser, 'sanctum')
                        ->getJson('/api/v1/users');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [[
                        'id',
                        'given_name',
                        'family_name',
                        'email',
                        'created_at',
                        'updated_at'
                    ]],
                    'message'
                ]);

        // Verify roles are included in the response data
        $responseData = $response->json('data');
        $this->assertNotEmpty($responseData);
        foreach ($responseData as $userData) {
            $user = User::find($userData['id']);
            $this->assertNotNull($user);
            $this->assertNotEmpty($user->getRoleNames());
        }
    }

    // Test create user
    public function test_create_user()
    {
        $userData = [
            'given_name' => 'Test',
            'family_name' => 'User',
            'preferred_name' => 'testuser',
            'preferred_pronouns' => ['they', 'them'],
            'email' => 'test@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
            'roles' => ['Student']
        ];

        $response = $this->actingAs($this->authUser, 'sanctum')
                        ->postJson('/api/v1/users', $userData);

        $response->assertStatus(200)  
                ->assertJson(['message' => 'User created successfully']);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'given_name' => 'Test',
            'family_name' => 'User',
        ]);

        $user = User::where('email', 'test@example.com')->first();
        $this->assertTrue($user->hasRole('Student'));
    }

    // Test read user
    public function test_read_user()
    {
        $user = User::factory()->create([
            'given_name' => 'John',
            'family_name' => 'Doe',
            'email' => 'john@example.com'
        ]);
        $user->assignRole('Staff');

        $response = $this->actingAs($this->authUser, 'sanctum')
                        ->getJson("/api/v1/users/{$user->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'User retrieved successfully.',
                    'data' => [
                        'id' => $user->id,
                        'given_name' => 'John',
                        'family_name' => 'Doe',
                        'email' => 'john@example.com'
                    ]
                ]);
    }

    // Test update user
    public function test_update_user()
    {
        $user = User::factory()->create([
            'given_name' => 'Original',
            'family_name' => 'Name',
            'email' => 'original@example.com'
        ]);
        $user->assignRole('Student');

        $updateData = [
            'given_name' => 'Updated',
            'family_name' => 'Name',
            'preferred_name' => 'updated',
            'preferred_pronouns' => ['she', 'her'],
            'email' => 'updated@example.com',
            'roles' => ['Admin']
        ];

        $response = $this->actingAs($this->authUser, 'sanctum')
                        ->putJson("/api/v1/users/{$user->id}", $updateData);

        $response->assertStatus(200)
                ->assertJson(['message' => 'User updated successfully.']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'given_name' => 'Updated',
            'email' => 'updated@example.com',
        ]);

        $user->refresh();
        $this->assertTrue($user->hasRole('Admin'));
        $this->assertFalse($user->hasRole('Student'));
    }

    public function test_delete_user()
    {
        $user = User::factory()->create([
            'given_name' => 'Delete',
            'family_name' => 'Me',
            'email' => 'delete@example.com'
        ]);
        $user->assignRole('Staff');

        $response = $this->actingAs($this->authUser, 'sanctum')
                        ->deleteJson("/api/v1/users/{$user->id}");

        $response->assertStatus(200)
                ->assertJson(['message' => 'User deleted successfully.']);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'email' => 'delete@example.com'
        ]);
    }
}
