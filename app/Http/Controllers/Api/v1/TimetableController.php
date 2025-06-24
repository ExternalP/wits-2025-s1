<?php

/**
 * Timetable Management API Controller.
 * - Allows  users to interact with timetable module.
 * 
 * Filename:        TimetableController.php
 * Location:        app/Http/Controllers/Api/v1/
 * Project:         wits-2025-s1
 * Date Created:    22/04/2025
 *
 * Author:          Luis Alvarez<20114831@tafe.wa.edu.au>
 * Student ID:      20114831
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

namespace App\Http\Controllers\Api\v1;

use App\Models\Timetable;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\v1\StoreTimetableRequest;
use App\Http\Requests\v1\UpdateTimetableRequest;

class TimetableController extends Controller
{

      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->cannot('timetable browse')) {
            return response()->json(['error' => 'You are not authorized to view timetables.'], 403);
        }
        $timetables = Timetable::with(['course', 'cluster', 'lecturer'])->get();
        return response()->json($timetables);
    }

     /**
     * Store a newly created resource in storage.
     */

    public function store(StoreTimetableRequest $request)
    {

        if (!Auth::check() || Auth::user()->cannot('timetable add')) {
            return response()->json(['error' => 'You are not authorized to add timetables.'], 403);
        }

        $timetable = Timetable::create($request->validated());
        return response()->json([
            'message' => 'Timetable created successfully.',
            'data' => $timetable
        ], 201);
    }

     /**
     * Display the specified resource.
     */

    public function show(Timetable $timetable)
    {
        if (!Auth::check() || Auth::user()->cannot('timetable read')) {
            return response()->json(['error' => 'You are not authorized to view this timetable.'], 403);
        }
        $timetable->load(['course', 'cluster', 'lecturer']);
        return response()->json($timetable);
    }

     /**
     * Update the specified resource in storage.
     */

    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        if (!Auth::check() || Auth::user()->cannot('timetable edit')) {
            return response()->json(['error' => 'You are not authorized to update timetables.'], 403);
        }

        $timetable->update($request->validated());
        return response()->json([
            'message' => 'Timetable updated successfully.',
            'data' => $timetable
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Timetable $timetable)
    {
        if (!Auth::check() || Auth::user()->cannot('timetable delete')) {
            return response()->json(['error' => 'You are not authorized to delete timetables.'], 403);
        }
        
        $timetable->delete();
        return response()->json([
            'message' => 'Timetable deleted successfully.'
        ]);
    }
}
