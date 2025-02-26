@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Performance Reviews</h1>
    <a href="{{ route('performances.create') }}" class="btn btn-primary">Record Performance Review</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Review Date</th>
                <th>Manager Comments</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($performances as $performance)
                <tr>
                    <td>{{ $performance->id }}</td>
                    <td>{{ $performance->employee_id }}</td>
                    <td>{{ $performance->review_date }}</td>
                    <td>{{ $performance->manager_comments }}</td>
                    <td>{{ $performance->rating }}</td>
                    <td>
                        <a href="{{ route('performances.edit', $performance->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('performances.destroy', $performance->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
