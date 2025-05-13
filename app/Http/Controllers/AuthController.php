<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $role = $request->validate([
        //     'role' => ['required', 'string', 'exists:roles,name',],
        // ]);
        $validated = $request->validate([
            'given_name' => ['required', 'min:1', 'max:255', 'string',],
            'family_name' => ['required', 'min:1', 'max:255', 'string',],
            'preferred_name' => ['nullable', 'min:1', 'max:255', 'string',],
            'preferred_pronouns' => ['nullable',],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class,],
            'password' => ['required', 'confirmed', 'min:4', 'max:255'],
            // 'role' => ['required', 'string', 'exists:roles,name', ],
            'roles' => ['required', 'array', 'exists:roles,name', ],
        ]);

        $user = User::create($validated);

        $user->assignRole($validated['roles']);
        // $user->assignRole($validated['role']);

        // $token = $user->createToken($request->email);
        $token = $user->createToken($validated['email']);

        return [
            'user' => $user,
            'role' => $user->roles,
            'token' => $token->plainTextToken,
        ];
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::defaults(),]
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }

        $token = $user->createToken($user->email);

        return [
            'user' => $user,
            'role' => $user->roles,
            'token' => $token->plainTextToken,
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
}
