@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5 col-md-9">
        <div class="card">
            <div class="card-header bg-dark" style="color: white">
                Todo Info... <i class="fas fa-info"></i>
            </div>

            <div class="card-body">
               <span class="mt-4">
                   <div class="row">
                       <div class="col-md-1">
                           <b>Title</b>
                       </div>

                       <div class="col-md-7">
                            <b>{{$todo->title}}</b>
                       </div>
                   </div>
               </span>
                <hr>
                <span class="mt-3">
                     <div class="row">
                           <div class="col-md-1">
                               <b>Body</b>
                           </div>

                           <div class="col-md-7">
                                <b> {{$todo->todo_body}}</b>
                           </div>
                      </div>
                 </span>
                <hr>
                <span class="mt-3">
                     <div class="row">
                           <div class="col-md-1">
                               <b>Time</b>
                           </div>

                           <div class="col-md-7">
                                <b> {{$todo->time}}</b>
                           </div>
                      </div>
                 </span>
                <a href="{{Route('todo.edit', $todo->todo_id)}}" class="btn btn-dark float-right" style="color: white">
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
