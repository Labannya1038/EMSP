@extends('layouts.app')

@section('content')
    <h1>Create Payroll</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payroll.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="number" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
