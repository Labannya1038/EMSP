@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Notifications</h1>
    <a href="{{ route('notifications.create') }}" class="btn btn-primary">Send Notification</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Message</th>
                <th>Date Sent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->user_id }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->date_sent }}</td>
                    <td>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline-block;">
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
