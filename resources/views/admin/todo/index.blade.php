@extends('layouts.app')
@section('content')
    <div class="m-lg-3">
        <div class="card col-md-8 mt-4">
            <div class="card-body">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-hover">
                                <thead style="background-color: #1a202c; color: #f7fafc">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title <i class="fas fa-check"></i></th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($todos as $todo)
                                    <tr>
                                        <td>{{$todo->todo_id}}</td>
                                        <td><a href="{{Route('admin.showTodo', $todo->todo_id)}}"
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
                                                            <a href="{{Route('admin.editTodo', $todo->todo_id)}}"
                                                               class="btn btn-dark">
                                                                Edit
                                                            </a>

                                                            <a href="{{Route('admin.deleteTodo', $todo->todo_id)}}"
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

                <!-- Trashed Todo-->
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-hover">
                                <thead style="background-color: #1a202c; color: #f7fafc">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title <i class="fas fa-trash"></i></th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trashedTodos as $trashedTodo)
                                    <tr>
                                        <td>{{$trashedTodo->todo_id}}</td>
                                        <td>{{$trashedTodo->title}}</td>

                                        <td>{{$trashedTodo->status}}</td>
                                        <td class="text-center">
                                            <a href="{{Route('admin.recoverTodo', $trashedTodo->todo_id)}}" class="btn bg-dark" style="color: white">
                                                Recover
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
