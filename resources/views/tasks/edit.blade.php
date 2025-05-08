@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-8 bg-white border border-gray-200 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">Edit Task</h1>

        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-y-6 gap-x-4">

                <!-- Title -->
                <label for="title" class="text-right md:col-span-1 pt-2 text-gray-700 font-medium">Title:</label>
                <div class="md:col-span-3">
                    <input type="text" name="title" id="title"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           required value="{{ old('title', $task->title) }}">
                    @error('title')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <label for="description" class="text-right md:col-span-1 pt-2 text-gray-700 font-medium">Description:</label>
                <div class="md:col-span-3">
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Due Date -->
                <label for="due_date" class="text-right md:col-span-1 pt-2 text-gray-700 font-medium">Due Date:</label>
                <div class="md:col-span-3">
                    <input type="date" name="due_date" id="due_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           required value="{{ old('due_date', $task->due_date) }}">
                    @error('due_date')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            
                <!-- Buttons -->
                <div class="md:col-span-1"></div>
                <div class="md:col-span-3 flex justify-end gap-4 mt-4">
                    <a href="{{ route('tasks.index') }}"
                        class="px-4 py-2 rounded-md text-gray-700 border border-gray-300 hover:text-green-600 hover:border-green-600 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 rounded-md text-green">
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

