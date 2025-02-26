@extends('layouts.app')

@section('content')
    <h1>Add Employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="contact_info">Contact Info</label>
            <input type="text" name="contact_info" class="form-control" value="{{ old('contact_info') }}">
        </div>
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" class="form-control" value="{{ old('department') }}">
        </div>
        <div class="form-group">
            <label for="date_of_joining">Date of Joining</label>
            <input type="date" name="date_of_joining" class="form-control" value="{{ old('date_of_joining') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
