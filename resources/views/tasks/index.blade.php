@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Your Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-black px-6 py-2 rounded-full shadow transition duration-200">
                + Add Task
            </a>
        </div>

        <!-- Filter and Search Form -->
        <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-wrap items-center gap-4 mb-6">
            <!-- Search -->
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by title or due date"
                class="border border-gray-300 p-3 rounded-lg w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <!-- Status Filter -->
            <select name="status" onchange="this.form.submit()" class="border p-3 rounded-lg bg-white text-gray-600 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Status</option>
                <option value="complete" {{ request('status') === 'complete' ? 'selected' : '' }}>Completed</option>
                <option value="incomplete" {{ request('status') === 'incomplete' ? 'selected' : '' }}>Incomplete</option>
            </select>

            <button type="submit" class="bg-blue-600 text-black px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Apply Filters
            </button>

            @if(request('status') || request('search'))
                <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:underline ml-4">Clear Filters</a>
            @endif
        </form>

        <!-- Task List -->
        @forelse ($tasks as $task)
            <div class="bg-white p-6 rounded-lg shadow-md mb-5 flex justify-between items-start">
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold {{ $task->is_complete ? 'line-through text-gray-500' : 'text-gray-900' }}">
                        {{ $task->title }}
                    </h2>
                    <p class="text-sm text-gray-600 mt-2">{{ $task->description }}</p>
                    <p class="text-sm text-gray-500 mt-2">Due Date: {{ \Carbon\Carbon::parse($task->due_date)->format('F j, Y') }}</p>

                    <span class="inline-block mt-3 px-4 py-2 text-sm font-medium rounded-full
                        {{ $task->is_complete ? 'bg-green-500 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $task->is_complete ? 'Completed' : 'Incomplete' }}
                    </span>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <!-- Toggle Status -->
                    <form method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-sm px-6 py-2 rounded-md border
                            {{ $task->is_complete ? 'border-yellow-500 text-yellow-600 hover:bg-yellow-50' : 'border-green-600 text-green-700 hover:bg-green-50' }}">
                            {{ $task->is_complete ? 'Mark Incomplete' : 'Mark Complete' }}
                        </button>
                    </form>

                    <!-- Edit Button -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="inline-flex items-center px-6 py-2 bg-blue-600 text-black rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-sm text-red-600 hover:underline mt-2" onclick="return confirm('Are you sure you want to delete this task?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-600">
                No tasks found. Try adjusting your search or filters.
            </div>
        @endforelse

        <!-- Pagination -->
    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
    </div>
@endsection



