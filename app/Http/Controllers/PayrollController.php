<?php
namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::all();
        return view('payroll.index', compact('payrolls'));
    }

    public function create()
    {
        return view('payroll.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        try {
            Payroll::create($request->all());
            return redirect()->route('payroll.index')->with('success', 'Payroll created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')->with('error', 'Error creating payroll: ' . $e->getMessage());
        }
    }

    public function edit(Payroll $payroll)
    {
        return view('payroll.edit', compact('payroll'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        try {
            $payroll->update($request->all());
            return redirect()->route('payroll.index')->with('success', 'Payroll updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')->with('error', 'Error updating payroll: ' . $e->getMessage());
        }
    }

    public function destroy(Payroll $payroll)
    {
        try {
            $payroll->delete();
            return redirect()->route('payroll.index')->with('success', 'Payroll deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')->with('error', 'Error deleting payroll: ' . $e->getMessage());
        }
    }
}
