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

        if ($currentUser->hasRole(['Superuser', 'Administrator'])) {
            $users = User::all();
        } else {
            $users = User::where('user_id', $currentUser->id)
                ->orWhere('id', $currentUser->id)
                ->get();
        }

        foreach ($users as $user) {
            $this->authorize('view', $user);
        }

        return view('users.home', [
            'users' => $users
        ]);
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
            ->orWhere('family_name', 'like', "%{$keywords}%")
            ->orWhere('email', 'like', "%{$keywords}%")
            ->orderBy('given_name')
            ->orderBy('family_name')
            ->get();

        return view('users.home', [
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
            'users.nickname as nickname',
            'users.id as id',
            'users.given_name as given_name',
            'users.family_name as family_name',
            'users.email as email',
            'users.created_at as created_at',
            'users.updated_at as updated_at',
            'users.user_id as user_id'
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
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store users in database
     */

    public function store(Request $request)
    {
        $allowedFields = ['nickname', 'given_name', 'family_name', 'email', 'password', 'password_confirmation'];

        $validator = Validator::make($request->all(), [
            'given_name' => 'required|string',
            'family_name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string|exists:roles,name',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'given_name.required' => ' given name is required.',
            'family_name.required' => ' family name is required.',
            'email.required' => 'email address is required.',
            'password.min' => 'password must be at least 8 characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $newUserData = $request->only($allowedFields);
        $newUserData['user_id'] = Auth::id();

        if (empty($newUserData['nickname'])) {
            $newUserData['nickname'] = $newUserData['given_name'];
        }

        if (!empty($newUserData['password'])) {
            $newUserData['password'] = Hash::make($newUserData['password']);
        }


        $newUser = new User($newUserData);


        $role = Role::findByName($request->input('role'), 'web');

        // Can current user create a Admin user?
        if (!$this->authorize('create', [$newUser])) {
            return redirect()->back()
                ->withErrors(['role' => 'Administrators are not allowed to create users with the Administrator role.'])
                ->withInput();
        }


        $user = User::create($newUserData);


        $user->assignRole($role);

        Session::flash('success', 'User created.');

        return redirect()->route('users.home');
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
