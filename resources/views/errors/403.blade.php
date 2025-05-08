@extends('layouts.app')

@section('content')
    <div class="text-center mt-10">
        <h1 class="text-4xl font-bold text-red-600">403</h1>
        <p class="text-xl">You are not authorized to access this task.</p>
        <a href="{{ route('tasks.index') }}" class="text-blue-500 mt-4 inline-block">Back to Tasks</a>
    </div>
@endsection
