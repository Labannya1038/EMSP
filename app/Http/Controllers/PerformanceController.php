<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::all();
        return view('performances.index', compact('performances'));
    }

    public function create()
    {
        return view('performances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'review_date' => 'required|date',
            'manager_comments' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Performance::create($request->all());
        return redirect()->route('performances.index')->with('success', 'Performance review recorded successfully.');
    }

    public function edit(Performance $performance)
    {
        return view('performances.edit', compact('performance'));
    }

    public function update(Request $request, Performance $performance)
    {
        $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'review_date' => 'required|date',
            'manager_comments' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $performance->update($request->all());
        return redirect()->route('performances.index')->with('success', 'Performance review updated successfully.');
    }

    public function destroy(Performance $performance)
    {
        $performance->delete();
        return redirect()->route('performances.index')->with('success', 'Performance review deleted successfully.');
    }
}
