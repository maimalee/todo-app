@extends('layouts.app')
@section('content')
    <div class="m-lg-3">
        <div class="card col-md-6 mt-4">
            <div class="card-header bg-dark">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-md-10 mt-2">
                                Add New Todo.....
                            </div>
                            <div class="col-md-2">
                                <div class="text-end">
                                    <button class="btn btn-dark">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-6 mt-4">
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
                                </tr>
                                </thead>


                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>My First Todo</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>My First Todo</td>
                                    <td>Pending</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>My First Todo</td>
                                    <td>Pending</td>
                                </tr>


                                <tr>
                                    <td>4</td>
                                    <td>My First Todo</td>
                                    <td>Pending</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>My First Todo</td>
                                    <td>Pending</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
