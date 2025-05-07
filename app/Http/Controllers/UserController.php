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
use Spatie\Permission\Models\Permission;




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

        $users = User::paginate(6);
        
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

        $currentUser = Auth::user();
        $user = User::select(
            'users.id as id',
            'users.given_name as given_name',
            'users.family_name as family_name',
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

        if (!($currentUser->hasRole('SuperAdmin') || 
        $currentUser->hasRole('Admin') || 
        $currentUser->id == $user->id)) {
    abort(403, 'You do not have permission to view this user.');
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
            'family_name' => ['required', 'min:1', 'max:255', 'string',],
            'preferred_name' => ['nullable', 'min:1', 'max:255', 'string',],
            'preferred_pronouns' => ['nullable','required',],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class,],
            'password' => ['required', 'confirmed', 'min:4', 'max:255'],
            'roles' => ['required', 'array'],
        ]);

        if (empty($validated['preferred_name'])) {
            $validated['preferred_name'] = $validated['given_name'];
        }

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
        // $this->authorize('update', $user);
        $currentUser = Auth::user();

        if (!$currentUser->hasRole('SuperAdmin') && $currentUser->id !== $user->id) {
            abort(403, 'You do not have permission to edit this user.');
        }
        $roles = $user->roles;
        $editable = false;

        $updateValues['updated_at'] = now();

        if ($currentUser->hasRole('SuperAdmin')) {
            $roles = Role::all();
            $editable = true;
        }

        return view('users.update', [
            'user' => $user,
            'roles' => $roles,
            'editable' => $editable,
        ]);
    }



    /**
     * Update a user
     */

    public function update(Request $request, User $user)
    {
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
            'updated_at' => now(),
        ];

        if ($request->password) {
            $updateValues['password'] = Hash::make($request->password);
        }

        $user->update($updateValues);

        if (Auth::user()->hasRole('SuperAdmin') && isset($validated['roles'])) {
            $user->syncRoles($validated['roles']);
        }

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully!');
        // return redirect()->route('users.show', $user);
    }

    /**
     * Delete a user
     */

    public function destroy(User $user)
    {
        $currentUser = Auth::user();

        if (!($currentUser->hasRole('SuperAdmin') || $currentUser->hasRole('Admin'))) {
            abort(403, 'You do not have permission to delete this user.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');

        
        // if (!$this->authorize('delete', $user)) {
        //     return redirect()->back()
        //         ->withErrors(['role' => 'Administrators are not allowed to delete other administrators.'])
        //         ->withInput();
        // }

        // $user->delete();
        // Session::flash('success', 'User deleted successfully');
        // return redirect()->route('users.home');
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
