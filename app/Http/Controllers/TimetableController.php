<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Course;
use App\Models\User;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TimetableController extends Controller
{

    //Prepares data for index view, it also filters by course and clusters and returns timetable's index page.
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = Timetable::query();


        if ($search) {
            $query->whereHas('course', function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
                ->orWhereHas('cluster', function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%");
                });
        }


        if ($filter) {
            $query->where('course_id', $filter);
        }


        $timetables = $query->with(['course', 'cluster', 'lecturer'])->paginate(10)->withQueryString();


        $timetablesCount = Timetable::count();


        $courses = Course::select(DB::raw("aqf_level || ' - ' || title as title_aqf"), 'id')->pluck('title_aqf', 'id');


        $clusters = Cluster::pluck('title', 'id');


        return view('timetables.index', [
            'timetables' => $timetables,
            'timetablesCount' => $timetablesCount,
            'search' => $search,
            'filter' => $filter,
            'courses' => $courses,
            'clusters' => $clusters,
        ]);
    }




    //Prepares data for detailed show view and returns timetable's show view.

    public function show(Timetable $timetable)
    {

        $timetable->load([
            'course.package',
            'course',
            'cluster',
            'clusters',
            'units',
            'lecturer',
        ]);


        $course = $timetable->course;
        $package = $course->package;
        $cluster = $timetable->cluster;
        $lecturer = $timetable->lecturer;
        $units = $timetable->units;
        $clusters = $timetable->clusters;

        return view('timetables.show', compact(
            'timetable',
            'course',
            'package',
            'cluster',
            'lecturer',
            'units'
        ));
    }



    // Prepares data for creation form and returns timetable's create view.
    public function create()
    {

        $courses = Course::select(DB::raw(" aqf_level || ' - ' || title as title_aqf"), 'id')->get();
        $lecturers = User::pluck('given_name', 'id');
        $clusters = Cluster::pluck('title', 'id');


        $courses = $courses->pluck('title_aqf', 'id');



        return view('timetables.create', compact('courses', 'lecturers', 'clusters'));
    }


    // Gets data sent from the creation form, validate it and save it on the database.
    public function store(Request $request)
    {

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'cluster_id' => 'required|exists:clusters,id',
            'lecturer_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'start_time' => 'required|date_format:H:i',
            'session_duration' => 'required|integer|min:1|max:10000',
        ]);


        $timetable = new Timetable();
        $timetable->course_id = $request->course_id;
        $timetable->cluster_id = $request->cluster_id;
        $timetable->lecturer_id = $request->lecturer_id;
        $timetable->start_date = $request->start_date;
        $timetable->end_date = $request->end_date;
        $timetable->start_time = $request->start_time;
        $timetable->session_duration = $request->session_duration;


        $timetable->save();


        return redirect()->route('timetables.index')->with('success', 'Timetable created successfully!');
    }



    // Prepares data for edit form and returns timetable's update view.


    public function edit(Timetable $timetable)
    {

        $courses = Course::select(DB::raw("aqf_level || ' - ' || title as title_aqf"), 'id')->get();
        $lecturers = User::pluck('given_name', 'id');
        $clusters = Cluster::pluck('title', 'id');


        $courses = $courses->pluck('title_aqf', 'id');

        return view('timetables.update', compact('timetable', 'courses', 'lecturers', 'clusters'));
    }



    // Gets data sent from the update form, validate it and save it on the database.
    public function update(Request $request, Timetable $timetable)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'cluster_id' => 'required|exists:clusters,id',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'session_duration' => 'required|integer|min:1',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'lecturer_id' => 'required|exists:users,id',
        ]);

        $timetable->update($validated);

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable updated successfully.');
    }


    //Deletes desired data and redirects to timetable's index.
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable deleted successfully.');
    }
}
