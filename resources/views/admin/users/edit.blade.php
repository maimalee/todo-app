@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-lg-auto col-md-9">
        <div class="card mt-3">
            <div class="card-header">
                Edit User
                <i class="fas fa-edit"></i>

            </div>

        <div class="card-body">
            <div class="container-fluid mt-lg-auto col-md-8">
                <form action="" method="POST">
                    @csrf
                    {{$errors}}

                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 col-form-label text-end">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fullname" id="fullname" value="{{old('fullname', $user->fullname)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label text-end">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username', $user->fullname)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-end">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
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

        <div class="card-footer">
           Updating User Info....
        </div>
    </div>
    </div>
@endsection
