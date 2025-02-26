@extends('layouts.app')

@section('content')
    <h1>Record Performance Review</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('performances.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="number" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
        </div>
        <div class="form-group">
            <label for="review_date">Review Date</label>
            <input type="date" name="review_date" class="form-control" value="{{ old('review_date') }}">
        </div>
        <div class="form-group">
            <label for="manager_comments">Manager Comments</label>
            <input type="text" name="manager_comments" class="form-control" value="{{ old('manager_comments') }}">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" class="form-control" value="{{ old('rating') }}" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary">Record</button>
    </form>
@endsection
