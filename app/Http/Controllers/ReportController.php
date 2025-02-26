<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string|max:255',
            'generated_by' => 'required|integer|exists:users,id',
            'date_generated' => 'required|date',
        ]);

        Report::create($request->all());
        return redirect()->route('reports.index')->with('success', 'Report generated successfully.');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'report_type' => 'required|string|max:255',
            'generated_by' => 'required|integer|exists:users,id',
            'date_generated' => 'required|date',
        ]);

        $report->update($request->all());
        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }

    public function download(Report $report)
    {
        // Assuming reports are stored as files in the storage
        $filePath = 'reports/' . $report->id . '.pdf'; // Example file path
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->route('reports.index')->with('error', 'Report file not found.');
        }
    }
}
