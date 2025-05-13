<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Timetable;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Http\Requests\v1\StoreTimetableRequest;
use App\Http\Requests\v1\UpdateTimetableRequest;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::with(['course', 'cluster', 'lecturer'])->get();
        return response()->json($timetables);
    }

    public function store(StoreTimetableRequest $request)
    {
        $timetable = Timetable::create($request->validated());
        return response()->json([
            'message' => 'Timetable created successfully.',
            'data' => $timetable
        ], 201);
    }

    public function show(Timetable $timetable)
    {
        $timetable->load(['course', 'cluster', 'lecturer']);
        return response()->json($timetable);
    }

    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        $timetable->update($request->validated());
        return response()->json([
            'message' => 'Timetable updated successfully.',
            'data' => $timetable
        ]);
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return response()->json([
            'message' => 'Timetable deleted successfully.'
        ]);
    }
}
