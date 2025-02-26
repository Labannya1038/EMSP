@extends('layouts.app')

@section('content')
    <h1>Record Leave</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="number" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
        </div>
        <div class="form-group">
            <label for="leave_type">Leave Type</label>
            <input type="text" name="leave_type" class="form-control" value="{{ old('leave_type') }}">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}">
        </div>
        <button type="submit" class="btn btn-primary">Record</button>
    </form>
@endsection
