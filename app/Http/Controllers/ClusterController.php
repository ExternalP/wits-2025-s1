<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Course;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClusterController extends Controller
{
    public function index(): View
    {
        return view('clusters.index', [
            'clusters' => Cluster::with(['courses', 'units'])
                ->latest()
                ->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('clusters.create', [
            'courses' => Course::all(),
            'units' => Unit::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:clusters',
            'title' => 'required|string|max:255',
            'state_code' => 'required|string|max:10',
            'course_id' => 'sometimes|exists:courses,id',
            'unit_id' => 'sometimes|exists:units,id',
        ]);

        $cluster = Cluster::create($validated);
        $cluster->courses()->sync($validated['course_id'] ?? []);
        $cluster->units()->sync($validated['unit_id'] ?? []);

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster created successfully.');
    }

    public function show(Cluster $cluster): View
    {
        return view('clusters.show', [
            'cluster' => $cluster->load(['courses', 'units'])
        ]);
    }

    public function edit(Cluster $cluster): View
    {
        return view('clusters.edit', [
            'cluster' => $cluster,
            'courses' => Course::pluck('national_code', 'id'),
            'units' => Unit::all(),
            'selectedUnits' => $cluster->units->pluck('id')->toArray(),
            'otherCourses' => Course::all()->whereNotIn('id', $cluster->courses->pluck('id')),
            'otherUnits' => Unit::all()->whereNotIn('id', $cluster->units->pluck('id')),
        ]);
    }

    public function update(Request $request, Cluster $cluster): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:clusters,code,'.$cluster->id,
            'title' => 'required|string|max:255',
            'state_code' => 'required|string|max:10',
            'course_id' => 'sometimes|exists:courses,id',
            'unit_id' => 'sometimes|exists:units,id',
        ]);

        $cluster->update($validated);
        $cluster->courses()->sync($validated['course_id'] ?? []);
        $cluster->units()->sync($validated['unit_id'] ?? []);

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster updated successfully.');
    }

    public function destroy(Cluster $cluster): RedirectResponse
    {
        $cluster->courses()->detach();
        $cluster->units()->detach();
        $cluster->delete();

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster deleted successfully.');
    }
}
