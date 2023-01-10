@extends('layouts.app')
@section('content')
    <div class="container-fluid col-md-10 mt-lg-auto">
        <div class="col-mt-5">
            <div class="card">
                <div class="card-header bg-dark" style="color: white">
                    Add New User...
                    <i class="fas fa-plus fa-spin"></i>
                </div>

                <div class="card-body mt-5">
                    <form action="" method="POST">
                        @csrf
                        {{$errors}}

                        <div class="form-group row">
                            <label for="fullname" class="col-sm-2 col-form-label text-end">
                                Fullname
                            </label>
                            <div class="col-sm-7">
                                <input type="text" name="fullname" id="fullname"
                                       class="form-control @error('fullname') is-invalid @enderror"
                                       value="{{old('fullname')}}">

                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label text-end">
                                Username
                            </label>

                            <div class="col-sm-7">
                                <input type="text" name="username" id="username"
                                       class="form-control @error('username') is-invalid @enderror"
                                       value="{{old('username')}}">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="phone" class="col-md-2 col-form-label text-md-end">{{__('Phone Number')}}</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                       value="{{old('phone')}}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <spna class="invalid-feedback">
                                    <strong> {{$message}}</strong>
                                </spna>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label text-sm-end">
                                Email
                            </label>

                            <div class="col-sm-7">
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{old('email')}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="{{$message}}"></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label text-end">
                                Role
                            </label>

                            <div class="col-sm-7">
                                <input type="text" name="role" id="role"
                                       class="form-control @error('role') is-invalid @enderror"
                                       value="{{old('role')}}">

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="{{$message}}"></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label text-end">
                                Password
                            </label>

                            <div class="col-sm-2">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="password" class="col-sm-3">
                                Confirm Password
                            </label>

                            <div class="col-sm-2">
                                <input type="password" id="password-confirm" name=password_confirmation class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-7">
                                <button class="btn btn-dark float-right">
                                    Submit
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
