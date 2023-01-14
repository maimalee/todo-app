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
                           Title
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
                               Body
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
                               Time
                           </div>

                           <div class="col-md-7">
                                <b> {{$todo->time}}</b>
                           </div>
                      </div>
                 </span>
            </div>
        </div>
    </div>
@endsection
