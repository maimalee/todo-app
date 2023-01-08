@extends('layouts.app')

@section('content')

    <!-- User Home PAge -->
    @if(\Illuminate\Support\Facades\Auth::user()['role'] != 'admin')
        This is Home
    @else

        <!-- Admin Home Page -->
        Admin Panel

    @endif

@endsection
