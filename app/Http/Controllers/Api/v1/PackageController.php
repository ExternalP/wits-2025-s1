<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Http\Requests\v1\StorePackageRequest;
use App\Http\Requests\v1\UpdatePackageRequest;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*return Package::all();*/
        $message = 'Found all '. Package::count() .' packages';
        $packages = Package::all();
        if ($packages->count() > 0) {
            return ApiResponse::success($packages, $message);
        }
        return ApiResponse::error([], 'No packages found', 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        if (Auth::user()->cannot('package add')) {
            return ApiResponse::error([], "You are not authorised to add new packages.", 403);
        }
        $package = Package::create($request->validated());

        return response()->json([
            'message' => 'Package created',
            'data' => $package,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::findOrFail($id);

        return response()->json([
            'message' => 'Package Found', 'data' => $package,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, string $id)
    {
        if (Auth::user()->cannot('package add')) {
            return ApiResponse::error([], "You are not authorised to update this package.", 403);
        }
        $package = Package::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        $package->update($request->validated());
        return response()->json(
            ['message' => 'Package updated successfully', 'data' => $package],
            201
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->cannot('package add')) {
            return ApiResponse::error([], "You are not authorised to delete these packages", 403);
        }
        $package = Package::find($id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }
        $package->delete();

        return response()->json([
            'message' => 'Package deleted successfully', 'data' => $package
        ]);

    }
}
