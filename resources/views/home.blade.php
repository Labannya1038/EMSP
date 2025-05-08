@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin)
        @include('admin_dashboard') 
    @else
        @include('user_dashboard') 
    @endif
@endsection


