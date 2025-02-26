@extends('layouts.app')

@section('content')
    <h1>Record Attendance</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="number" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}">
        </div>
        <button type="submit" class="btn btn-primary">Record</button>
    </form>
@endsection
