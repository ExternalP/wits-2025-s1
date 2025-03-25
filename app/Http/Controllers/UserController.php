<?php

/**
 * Assessment Title: WITS-2025-S1
 * Cluster:          SaaS: Part 2 – Back End Development
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 * User Management Controller
 *
 * Filename:        UserController.php
 * Location:        /App/Http/Controllers
 * Project:          WITS-2025-S1
 * Date Created:    11/02/2024
 *
 * Author:          Luis Alvarez <20114831@tafe.wa.edu.au>
 *
 *
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;




class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     *Get all users and send them to the view.
     */
    public function index()
    {
        $currentUser = Auth::user();

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        // Superadmin Can access all user list
        if ($currentUser->hasRole('SuperAdmin')) {
            $users = User::paginate(6);
        } else {
            // register Can access there own data.
            $users = User::where('user_id', $currentUser->id)
                ->orWhere('id', $currentUser->id)
                ->paginate(6);
        }
        return view('users.index', compact('users'));
    }

    /**
     *Get number of users.
     */

    public function numberUsers()
    {

        $totalUsers = User::count();

        return $totalUsers;
    }

    /**
     * Search users by keywords/location.
     */
    public function search(Request $request)
    {
        $keywords = $request->input('keywords', '');

        $users = User::where('given_name', 'like', "%{$keywords}%")
            ->orWhere('preferred_name', 'like', "%{$keywords}%")
            ->orWhere('email', 'like', "%{$keywords}%")
            ->orderBy('given_name')
            ->orderBy('preferred_name')
            ->get();

        return view('users.index', [
            'users' => $users,
            'keywords' => $keywords,
        ]);
    }

    /**
     * Show a single user
     */

    public function show($id)
    {

        $user = User::select(
            'users.id as id',
            'users.given_name as given_name',
            'users.preferred_name as preferred_name',
            'users.email as email',
            'users.preferred_pronouns as preferred_pronouns',
            'users.created_at as created_at',
            'users.updated_at as updated_at',

        )
            ->where('users.id', $id)
            ->first();



        // Check if user exists
        if (!$user) {
            return response()->view('errors.404', ['message' => 'User not found'], 404);
        }

        return view('users.show', [
            'user' => $user,
        ]);
    }


    /**
     * Show the user create form
     */
    public function create()
    {
        $roles = Role::all();
        $preferred_pronounses = [
            'he/him',
            'she/her',
        ];

        return view('users.create', compact('roles', 'preferred_pronounses'));
    }

    /**
     * Store users in database
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'given_name' => ['required', 'min:1', 'max:255', 'string',],
            'preferred_name' => ['required', 'min:1', 'max:255', 'string',],
            'preferred_pronouns' => ['required',],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class,],
            'password' => ['required', 'confirmed', 'min:4', 'max:255'],
            'roles' => ['required', 'array'],
        ]);

        $validated['preferred_pronouns'] = implode(',', $validated['preferred_pronouns']);
        $validated['id'] = Auth::id();

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return redirect(route('users.index'))
            ->with('success', 'User created');
    }


    /**
     * Show the user edit form
     */

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::where('name', '!=', 'Superuser')->get();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }



    /**
     * Update a user
     */

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'given_name' => 'required|string',
            'family_name' => 'required|string',
            'nickname' => 'nullable|string',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string'
        ], [
            'given_name.required' => 'Given name is required',
            'family_name.required' => 'Family name is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Passwords do not match',
            'role.required' => 'Role is required'
        ]);

        $allowedFields = ['nickname', 'given_name', 'family_name', 'email'];
        $updateValues = $request->only($allowedFields);

        if (empty($updateValues['nickname'])) {
            $updateValues['nickname'] = $updateValues['given_name'];
        }

        if ($request->password) {
            $updateValues['password'] = Hash::make($request->password);
        }

        $updateValues['updated_at'] = now();
        $user->update($updateValues);


        if ($request->role !== 'Superuser') {
            $user->syncRoles($request->role);
        }

        Session::flash('success', 'User updated successfully.');
        return redirect()->route('users.show', $user);
    }

    /**
     * Delete a user
     */

    public function destroy(User $user)
    {
        if (!$this->authorize('delete', $user)) {
            return redirect()->back()
                ->withErrors(['role' => 'Administrators are not allowed to delete other administrators.'])
                ->withInput();
        }

        $user->delete();
        Session::flash('success', 'User deleted successfully');
        return redirect()->route('users.home');
    }


    /**
     * Get trashed users
     */

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('users.trashed', ['users' => $users]);
    }

    /**
     * Permanently delele trashed users
     */
    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $user);

        $user->forceDelete();
        return redirect()->route('users.home')->with('success', 'User permanently deleted successfully.');
    }

    /**
     * Restore trashed users
     */

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $this->authorize('restore', $user);

        $user->restore();
        return redirect()->route('users.home')->with('success', 'User restored successfully.');
    }
}
