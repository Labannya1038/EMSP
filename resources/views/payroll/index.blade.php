@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Payrolls</h1>
    <a href="{{ route('payroll.create') }}" class="btn btn-primary">Create Payroll</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee_id }}</td>
                    <td>{{ $payroll->amount }}</td>
                    <td>{{ $payroll->date }}</td>
                    <td>
                        <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST" style="display:inline-block;">
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
