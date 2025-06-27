<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: [])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->orderByDesc('id')->get();
        $transformed = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'given_name' => $user->given_name,
                'family_name' => $user->family_name,
                'preferred_name' => $user->preferred_name,
                'preferred_pronouns' => $user->preferred_pronouns,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'profile_photo' => $user->profile_photo,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'roles' => $user->roles->pluck('name')->toArray() 
            ];
        });
        return ApiResponse::sendResponse($transformed, 'Users retrieved successfully.', 200);
        // $users = User::orderByDesc('id')->get();
        // return ApiResponse::sendResponse($users, 'Users retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'given_name' => 'required|min:1|max:255|string',
            'family_name' => 'required|min:1|max:255|string',
            'preferred_name' => 'nullable|min:1|max:255|string',
            'preferred_pronouns' => 'nullable',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:4|max:255',
            'roles' => 'required|array',
        ]);
        if (empty($validated['preferred_name'])) {
            $validated['preferred_name'] = $validated['given_name'];
        }
        $validated['preferred_pronouns'] = implode(',', $validated['preferred_pronouns']);
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->syncRoles($validated['roles']);

        return ApiResponse::sendResponse($user, 'User created successfully', 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return ApiResponse::sendResponse('User not found', [], 404);
        }

        return ApiResponse::sendResponse($user, 'User retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

    if (!$user) {
        return ApiResponse::sendResponse('User not found', [], 404);
    }

    $validated = $request->validate([
        'given_name' => 'required|string',
        'family_name' => 'required|string',
        'preferred_name' => 'nullable|string',
        'preferred_pronouns'=> 'nullable',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6|confirmed',
        'roles' => 'required|array'
    ]);

    if (empty($validated['preferred_name'])) {
        $validated['preferred_name'] = $validated['given_name'];
    }

    $validated['preferred_pronouns'] = implode(',', $validated['preferred_pronouns'] ?? []);

    $updateValues = [
        'given_name' => $validated['given_name'],
        'family_name' => $validated['family_name'],
        'preferred_name' => $validated['preferred_name'],
        'email' => $validated['email'],
        'preferred_pronouns' => $validated['preferred_pronouns'],
    ];

    if (!empty($validated['password'])) {
        $updateValues['password'] = Hash::make($validated['password']);
    }

    $user->update($updateValues);
    $user->syncRoles($validated['roles']);

    return ApiResponse::sendResponse($user, 'User updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponse::sendResponse('User not found', [], 404);
        }

        $user->delete();

        return ApiResponse::sendResponse(null, 'User deleted successfully.', 200);
        
    }
}
