<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::paginate(6);
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'national_code' => ['required', 'min:1', 'max:255', 'string'],
            'title' => ['required', 'min:1', 'max:255', 'string'],
            'tga_status' => ['sometimes', 'nullable', 'max:255', 'string'],

        ]);

        $p = new package($validated);


        return redirect()->route('packages.index')->with('success', 'packages created successfully!');
    }

    public function show(package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function edit(package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, package $package)
    {
        $validated = $request->validate([
            'national_code' => ['required', 'min:1', 'max:255', 'string'],
            'title' => ['required', 'min:1', 'max:255', 'string'],
            'tga_status' => ['sometimes', 'nullable', 'max:255', 'string'],
        ]);

        $package->update($validated);

        return redirect(route('packages.show', $package->id))->with('success', 'packages updated');
    }

    public function destroy(package $package)
    {
        $package->delete();
        return redirect(route('packages.index'))->with('success', 'packages deleted');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('national_code', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->orWhere('tga_status', 'like', "%{$query}%")
            ->paginate(10);

        return view('users.index', compact('users'));
    }


}
