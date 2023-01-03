@extends('layouts.app')
@section('content')
    <div class="card col-md-6 mt-4">
        <div class="card-header">
            Todo Page
        </div>

        <div class="card-body">

        </div>

    </div>
    @foreach($todos as $todo)
        <br>
        {{$todo->todo_body}}

    @endforeach
@endsection
