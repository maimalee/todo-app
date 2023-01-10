@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-lg-auto col-md-9">
        <div class="card mt-3">
            <div class="card-header bg-dark" style="color: white">
                Edit Todo <i class="fas fa-edit"></i>
                <i class="fas fa-edit"></i>

            </div>

            <div class="card-body">
                <div class="container-fluid mt-lg-auto col-md-8">
                    <form action="" method="POST">
                        @csrf
                        {{$errors}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-end">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" value="{{old('title', $todo->title)}}">
                            </div>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="todo_body" class="col-sm-3 col-form-label text-end">Todo Body</label>
                            <div class="col-sm-9">
                                <textarea name="todo_body" id="todo_body" cols="30" rows="10" class="form-control @error('todo_body') is-invalid @enderror">{{old('todo_body', $todo->todo_body)}}</textarea>
                                @error('todo_body')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-end">Email</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" id="timeDate" name="timeDate" value="{{old('time', $todo->time)}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="text-end">
                                    <button class="btn btn-dark btn-lg float-right">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-footer bg-dark" style="color: white">
                Updating Todo Details....
            </div>
        </div>
    </div>
@endsection
