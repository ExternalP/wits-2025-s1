<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'given_name' => 'TestGiv',
        'family_name' => 'TestFam',
        // 'preferred_name' => 'TestPref',
        'preferred_pronouns' => 'He/him',
        'email' => 'test999@example.com',
        // 'email_verified_at' => now(),
        // 'password' => 'password',
        // 'password_confirmation' => 'password',
        'password' => 'Password1',
        'password_confirmation' => 'Password1',
        // 'profile_photo' => 'test.jpg',
        'roles' => ['Student'],
    ]);

    $response->assertValid();

    // $this->assertAuthenticated('web');
    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
