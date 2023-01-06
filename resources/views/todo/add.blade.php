@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-7">
            <div class="card mt-2">
                <div class="card-header bg-dark" style="color: white">
                    Create New Today
                </div>


                <form action="{{Route('todo.store')}}" method="POST">
                    @csrf
                    {{$errors}}
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <label for="title" class="mt-2 text-end">Title</label>
                            </div>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       name="title"
                                       id="title">
                                @error('title')
                                <div class="invalid-feedback">
                                    <strong class="text-warning">
                                        {{$message}}
                                    </strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row text-center mt-3">
                            <div class="col-md-3">
                                <label for="title" class="mt-2 text-end">Title</label>
                            </div>

                            <div class="col-md-7">
                                <textarea name="todo_body" id="todo_body" cols="30" rows="10"
                                          class="form-control"></textarea>
                                @error('todo_body')
                                <div class="invalid-feedback">
                                    <strong class="text-warning">
                                        {{$message}}
                                    </strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="timeDate" class="mt-3">
                                    Set Time&Date
                                </label>
                            </div>

                            <div class="col-md-7 mt-3">
                                <input type="datetime-local" name="timeDate" id="timeDate" class="form-control @error('date') is-invalid
                                @enderror">

                                @error('timeDate')
                                <sapn class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </sapn>
                                @enderror
                            </div>
                        </div>
                        <div class="" style="margin-left: 80%">
                            <button class="btn btn-dark mt-3 text-center">
                                <i class="fa fa-plus"></i>
                                Add
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
