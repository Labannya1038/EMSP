@extends('layouts.app')

@section('content')
    <h1>Edit Notification</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" name="user_id" class="form-control" value="{{ old('user_id', $notification->user_id) }}">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" name="message" class="form-control" value="{{ old('message', $notification->message) }}">
        </div>
        <div class="form-group">
            <label for="date_sent">Date Sent</label>
            <input type="date" name="date_sent" class="form-control" value="{{ old('date_sent', $notification->date_sent) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
