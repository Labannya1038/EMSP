<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $query = Task::where('user_id', auth()->id());

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'complete') {
                $query->where('is_complete', true);
            } elseif ($request->status === 'incomplete') {
                $query->where('is_complete', false);
            }
        }

        // Search by title or due date
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('due_date', 'like', '%' . $request->search . '%');
            });
        }

        $tasks = $query->latest()->paginate(5)->withQueryString();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        auth()->user()->tasks()->create($request->only('title', 'description', 'due_date'));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task); // optional for auth check
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        $task->update($request->only('title', 'description', 'due_date'));

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('update', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }

    public function toggleComplete(Task $task)
    {
        $task->update(['is_complete' => !$task->is_complete]);
        return back()->with('success', 'Task status updated.');
    }

}
