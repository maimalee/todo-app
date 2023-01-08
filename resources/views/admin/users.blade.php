@extends('layouts.app')
@section('content')
    <div class="m-lg-3">
        <div class="card col-md-8 mt-4">
            <div class="card-header bg-dark">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-md-10 mt-2">
                                Add New User.....
                            </div>
                            <div class="col-md-2">
                                <div class="text-end">
                                    <a href="" class="btn btn-dark">
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

            <div class="card-header mt-3">
                <div class="row">
                    <div class="col-md-10">
                        Active Users
                    </div>

                    <div class="col-md-2 text-end">
                        <i class="fas fa-check me-2"></i>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="card mt-1">
                    <div class="card-body">

                        <div class="">
                            <table class="table table-hover">
                                <thead style="background-color: #1a202c; color: #f7fafc">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->user_id}}</td>
                                        <td><a href="" class="text-decoration-none">{{$user->fullname}}</a></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                    data-target="#show-buttons-{{$user->user_id}}">
                                                ...
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade mt-5" id="show-buttons-{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit or Delete User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="action" style="">
                                                        <div class="m-lg-3">
                                                            <a href="{{Route('admin.edit', $user->user_id)}}" class="btn btn-dark">
                                                                Edit
                                                            </a>

                                                            <a href="{{Route('admin.delete', $user->user_id)}}" class="btn btn-danger">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    <!-- Deleted Users -->

    <div class="m-lg-3">
        <div class="card col-md-8 mt-4">
            <div class="card-header mt-3">
                <div class="row">
                    <div class="col-md-10">
                        Deleted Users
                    </div>

                    <div class="col-md-2 text-end">
                        <i class="fas fa-times me-2"></i>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="card mt-1">
                    <div class="card-body">

                        <div class="">
                            <table class="table table-hover">
                                <thead style="background-color: #1a202c; color: #f7fafc">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($deletedUsers as $deletedUser)
                                    <tr>
                                        <td>{{$deletedUser->user_id}}</td>
                                        <td><a href="" class="text-decoration-none">{{$deletedUser->fullname}}</a></td>
                                        <td class="text-center">
                                            <a href="{{ROute('admin.recover', $deletedUser->user_id)}}" class="btn btn-dark">
                                                <i class=""></i>
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

@section('script')
    {{--    <script>--}}
    {{--        // When the user clicks on the "Show Buttons" button--}}
    {{--        $(document).ready(function (){--}}
    {{--            $('#show-buttons').click(function() {--}}
    {{--                // Show the Edit and Delete buttons--}}
    {{--                $('#edit-show').show();--}}
    {{--                $('#delete-show').show();--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
