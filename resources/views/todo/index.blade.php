@extends('layouts.app')
@section('content')
    <div class="m-lg-3">
        <div class="card col-md-8 mt-4">
            <div class="card-header bg-dark">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-md-10 mt-2">
                                Add New Todo.....
                            </div>
                            <div class="col-md-2">
                                <div class="text-end">
                                    <a href="{{Route('todo.create')}}" class="btn btn-dark">
                                        +
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-8 mt-4">
            <div class="card-body">
            <span class="mt-4">
                <h4>
                    Todo's <br>

                </h4>

                <h5>
                    1 completed <br>
                    3 pending <br>
                </h5>
            </span>

                <div class="card mt-5">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-hover">
                                <thead style="background-color: #1a202c; color: #f7fafc">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($todos as $todo)
                                    <tr>
                                        <td>{{$todo->todo_id}}</td>
                                        <td><a href="{{Route('todo.show', $todo['todo_id'])}}"
                                               class="text-decoration-none">{{$todo->title}}</a></td>

                                        <td>{{$todo->status}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                    data-target="#show-buttons-{{$todo->todo_id}}">
                                                ...
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade mt-5" id="show-buttons-{{$todo->todo_id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit or Delete
                                                        User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="action" style="">
                                                        <div class="m-lg-3">
                                                            <a href="{{Route('todo.edit', $todo->todo_id)}}"
                                                               class="btn btn-dark">
                                                                Edit
                                                            </a>

                                                            <a href="{){Route('todo.delete', $todo->todo_id)}}"
                                                               class="btn btn-danger">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
