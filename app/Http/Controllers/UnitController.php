<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Cluster;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $rowsPerPage = 6;
        $validated = $request->validate([
            // 'search' => ['nullable', 'string', 'max:100'],
            // 'filter' => ['nullable', 'integer'],
            'page' => ['nullable', 'integer'],
        ]);
        $unitCount = Unit::count();
        $units = Unit::select('units.*')->paginate($rowsPerPage);
        return view('units.index',compact(['units','unitCount']));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {

    }
    public function show(string $id)
    {

    }
    public function edit(string $id)
    {

    }
    public function update(Request $request, string $id)
    {

    }
    public function destroy(string $id)
    {

    }
}
