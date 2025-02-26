@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Reports</h1>
    <a href="{{ route('reports.create') }}" class="btn btn-primary">Generate Report</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Report Type</th>
                <th>Generated By</th>
                <th>Date Generated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->report_type }}</td>
                    <td>{{ $report->generated_by }}</td>
                    <td>{{ $report->date_generated }}</td>
                    <td>
                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('reports.download', $report->id) }}" class="btn btn-success">Download</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
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
