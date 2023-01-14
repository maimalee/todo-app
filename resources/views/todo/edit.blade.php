@extends('layouts.app')
@section('content')
  <div class="container-fluid mt-5 col-md-7">
      <div class="card">
          <div class="card-header bg-dark" style="color: white">
              Editing Todo... <i class="fas fa-edit"></i>
          </div>

          <form action="" method="post">
             <div class="card-body">
                 @csrf
                 {{$errors}}

                 <div class="row text-center mt-3">
                     <div class="col-md-2">
                         <label for="title" class="mt-2">Title</label>
                     </div>
                     <div class="col-md-7">
                         <input type="text" name="title" class="form-control mt-2 @error('title') is-invalid @enderror" value="{{old('tile', $todo->title)}}">

                         @error('title')
                         <span class="invalid-feedback" role="alert">
                             <stron>{{$message}}</stron>
                         </span>
                         @enderror
                     </div>
                 </div>

                 <div class="row text-center mt-3">
                     <div class="col-md-2">
                         <label for="todo_body" class="mt-2">Body</label>
                     </div>
                     <div class="col-md-7">
                         <textarea name="todo_body" id="" cols="30" rows="10" class="form-control @error('todo_body') is-invalid @enderror">
                             {{old('todo_body', $todo->todo_body)}}
                         </textarea>
                         @error('todo_body')
                         <span class="invalid-feedback" role="alert">
                             <stron>{{$message}}</stron>
                         </span>
                         @enderror
                     </div>
                 </div>

                 <div class="row text-center mt-3">
                     <div class="col-md-2">
                         <label for="time" class="mt-2">Time</label>
                     </div>
                     <div class="col-md-7">
                         <input type="datetime-local" name="timeDate" class="form-control mt-2 @error('time') is-invalid @enderror" value="{{old('tile', $todo->time)}}">

                         @error('time')
                         <span class="invalid-feedback" role="alert">
                             <stron>{{$message}}</stron>
                         </span>
                         @enderror
                     </div>
                 </div>

                 <div class="row mt-3">
                     <div class="col-md-2">

                     </div>

                     <div class="col-md-7 float-right">
                         <button class="btn btn-dark float-right " style="color: white">
                             Submit
                         </button>
                     </div>
                 </div>

             </div>
          </form>
          <div class="card-footer bg-dark" style="color: white">
              Fill free to edit your Todo....
          </div>
      </div>
  </div>

@endsection
