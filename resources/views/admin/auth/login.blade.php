@extends('layouts.admin')

@section('title', 'Admin Login')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg" style="border:1px solid silver;">
                <div class="card-header text-uppercase text-center bg-blue " style="letter-spacing:2px;font-size:20px;font-weight:bolder;">Admin Login</div>
                <div class="nav-divider " style="margin-top:-18px;"><hr></div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" name="email" value="{{old('email')}}" style="font-size:18px;font-family:Verdana, Geneva, Tahoma, sans-serif;letter-spacing:2px;" >
                            <div class="d-inline">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password" name="password" style="font-size:18px;font-family:Verdana, Geneva, Tahoma, sans-serif;letter-spacing:2px;">
                            <div class="d-inline">
                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button style="font-size:18px; font-weight:bolder; font-family:Verdana, Geneva, Tahoma, sans-serif;letter-spacing:3px;"type="submit" class="btn btn-primary mt-3 form-control">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
