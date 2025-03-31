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
            'clusters' => Cluster::with(['course', 'units'])
                ->latest()
                ->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('clusters.create', [
            'courses' => Course::pluck('national_code', 'id'),
            'units' => Unit::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:clusters',
            'title' => 'required|string|max:255',
            'state_code' => 'required|string|max:10',
            'course_id' => 'required|exists:courses,id',
        ]);

        $cluster = Cluster::create($validated);
        $cluster->units()->sync($validated['units'] ?? []);

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster created successfully.');
    }

    public function show(Cluster $cluster): View
    {
        return view('clusters.show', [
            'cluster' => $cluster->load(['course', 'units'])
        ]);
    }

    public function edit(Cluster $cluster): View
    {
        return view('clusters.edit', [
            'cluster' => $cluster,
            'courses' => Course::pluck('national_code', 'id'),
            'units' => Unit::all(),
            'selectedUnits' => $cluster->units->pluck('id')->toArray()
        ]);
    }

    public function update(Request $request, Cluster $cluster): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:clusters,code,'.$cluster->id,
            'title' => 'required|string|max:255',
            'state_code' => 'required|string|max:10',
            'course_id' => 'required|exists:courses,id',
        ]);

        $cluster->update($validated);
        $cluster->units()->sync($validated['units'] ?? []);

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster updated successfully.');
    }

    public function destroy(Cluster $cluster): RedirectResponse
    {
        $cluster->units()->detach();
        $cluster->delete();

        return redirect()->route('clusters.index')
            ->with('success', 'Cluster deleted successfully.');
    }
}
