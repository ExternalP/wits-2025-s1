<?php
/**
 * Course Management Controller.
 * - Provides course management functions (BREAD) for administrative users.
 *
 * Filename:        CourseController.php
 * Location:        app/Http/Controllers/
 * Project:         wits-2025-s1
 * Date Created:    25/02/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 * Student ID:      20135656
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Course;
use App\Models\Package;
use App\Models\Unit;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

require_once base_path("app/helpers/helpers.php");

class CourseController extends Controller
{
    /**
     * Browse: Displays a list of all courses
     *  with search & filter functionality.
     *
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View|RedirectResponse
    {
        $rowsPerPage = 6;
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'filter' => ['nullable', 'integer'],
            'page' => ['nullable', 'integer'],
        ]);

        $search = $validated['search'] ?? null;
        $filter = $validated['filter'] ?? null;

        $packages = Package::all()->keyBy('id')->map(fn ($i) => $i['national_code'] .': '. $i['title']);

        if ($search) {
            $courses = Course::select('courses.*')
                ->whereAny(['national_code','aqf_level','title','tga_status','state_code','nominal_hours',], 'like', "%$search%")
                ->paginate($rowsPerPage);
            $courses->appends(['search' => $search]);
        } elseif ($filter) {
            $courses = Course::select('courses.*')
                ->where('package_id', '=', $filter)
                ->paginate($rowsPerPage);
            $courses->appends(['filter' => $filter]);
        } else {
            $courses = Course::select('courses.*')
                ->paginate($rowsPerPage);
        }

        $filter = Package::find($filter);
        // Total number of courses in database.
        $coursesCount = Course::count();
        // $trashedCount = Course::onlyTrashed()->latest()->get()->count();
        // Session::flash('message', 'This is a message!');
        return view('courses.index', compact(['courses','search','coursesCount','filter','packages',]));
    }

    /**
     * Show the form for creating a new course.
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        // if (Auth::user()->cannot('course add')) {
        //     return back()
        //         ->with('error', 'You are not authorised to access that page.');
        // }

        $packages = Package::all()->keyBy('id')->map(fn ($i) => $i['national_code'] .': '. $i['title']);
        $uniqueAqfs = Course::uniqueAqfs();

        $clusters = Cluster::all()->sortBy('title');
        $units = Unit::all()->sortBy('national_code');
        // $units = Unit::select('units.*')->orderBy('national_code')->paginate(100);

        return view('courses.create', compact(['uniqueAqfs', 'packages', 'clusters', 'units',]));
    }

    /**
     * Store a newly created course in the database.
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // if (Auth::user()->cannot('course add')) {
        //     return back()
        //         ->with('error', 'You are not authorised to perform that action.');
        // }

        $validated = $request->validate([
            'package_id' => ['required', 'integer', 'exists:packages,id',],
            'national_code' => ['required', 'string', 'min:4', 'max:10', 'uppercase', 'alpha_num', /*Rule::unique('courses', 'national_code')*/],
            'aqf_level' => ['required', 'string', 'min:1', 'max:100',],
            'title' => ['required', 'string', 'min:1', 'max:255',],
            'tga_status' => ['sometimes', 'nullable', 'string', Rule::in(Course::tgaStatuses())],
            'state_code' => ['required', 'string', 'min:4', 'max:10', 'uppercase', 'alpha_num',],
            'nominal_hours' => ['required', 'integer', 'min:0', 'max:10000',],
            'type' => ['sometimes', 'nullable', 'string', 'min:1', 'max:50',],
            'cluster_id' => ['sometimes', 'exists:clusters,id',],
            'unit_id' => ['sometimes', 'exists:units,id',],
            // 'gggggggg' => ['required', 'string', 'min:000000', 'max:99999',],
        ]);

        $course = Course::create($validated);

        $course->clusters()->attach($validated['cluster_id']);
        $course->units()->attach($validated['unit_id']);

        return redirect(route('courses.index'))
            ->with('success', 'Course '. $course['aqf_level'] .' '. $course['title'] .' created');
    }

    /**
     * Display a course's details.
     * @param  string  $id
     * @return View|RedirectResponse
     */
    public function show(string $id): View|RedirectResponse
    {
        // if (Auth::user()->cannot('course show')) {
        //     return back()
        //         ->with('error', 'You are not authorised to access that page.');
        // }

        $course = Course::with('units', 'clusters')->find($id);
        $package = Package::find($course->package_id);
        // $clusters = Cluster::all()->sortBy('title');
        // $units = Unit::all()->sortBy('national_code');

        if (!$course) {
            return redirect(route('courses.index'))
                ->with('warning', 'Course not found');
        }

        return view('courses.show', compact(['course','package',]))
            ->with('success', 'Course found');
    }

    /**
     * Show the form for editing the specified course.
     * @param  string  $id
     * @return View|RedirectResponse
     */
    public function edit(string $id): View|RedirectResponse
    {
        return redirect(route('courses.index'))
            ->with('error', 'It WORKED');
            // ->with(formatFlash('warning', 'This is a message!'));
            // ->with(['type' => 'Warning','message' => 'TEST WARNING']);
        // $joke = Joke::where('id', '=', $id)->get()->first();
        //
        // if (!$joke) {
        //     return redirect(route('jokes.index'))
        //         ->with('warning', 'Joke not found');
        // }
        //
        // // Authorisation
        // if (Auth::user()->cannot('joke edit')
        //     || (Auth::id() != $joke->author_id && Auth::user()->cannot('Client'))) {
        //     return redirect(route('jokes.index'))
        //         ->with('error', 'You are not authorised to edit this joke');
        // }
        //
        // return view('jokes.update', compact(['joke',]))
        //     ->with('success', 'Joke found');
    }

    /**
     * Update the specified course in the database.
     * @param  Request  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // $joke = Joke::whereId($id)->get()->first();
        //
        // if (!$joke) {
        //     return redirect(route('jokes.index'))
        //         ->with('warning', 'Joke not found');
        // }
        //
        // // Authorisation
        // if (Auth::user()->cannot('joke edit')
        //     || (Auth::id() != $joke->author_id && Auth::user()->cannot('Client'))) {
        //     return redirect(route('jokes.index'))
        //         ->with('error', 'You are not authorised to edit this joke');
        // }
        //
        // $validated = $request->validate([
        //     'title' => ['required', 'max:255', 'string',],
        //     'category' => ['sometimes', 'nullable', 'min:1', 'max:255', 'string',],
        //     'body' => ['required', 'min:1', 'string',],
        //     'tags' => ['sometimes', 'nullable', 'string',],
        // ]);
        //
        // $joke->fill($validated);
        //
        // $joke->save();
        //
        // return redirect(route('jokes.show', compact(['joke', 'id'])))
        //     ->with('success', 'Joke updated');
    }

    /**
     * Remove the specified course from the database.
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // $joke = Joke::whereId($id)->get()->first();
        //
        // if (!$joke) {
        //     return redirect(route('jokes.index'))
        //         ->with('warning', 'Joke not found');
        // }
        //
        // if (Auth::user()->can('joke delete')
        //     && (Auth::id() == $joke->author_id || Auth::user()->can('Client'))) {
        //
        //     $joke->delete();
        //     return redirect(route('jokes.index'))
        //         ->with('success', "Joke '{$joke->title}' deleted");
        // }
        //
        // return back()
        //     ->with('error', 'You are not authorized to delete this joke');
    }

}
