@extends('layouts.admin')

@section('title', 'Admin|Manage Lecturer')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-10">
                <div class="card" style="margin-left:-25px;">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Lecturer </h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                            @endif
                            <div class="form-row">
                                <div class="col mb-2">
                                    <input type="text" name="First_name" placeholder="First Name"
                                           class="form-control @error('First_name') is-invalid @enderror"
                                           value="{{old('First_name')}}">
                                    @error('First_name')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" name="Other_names" placeholder="Other Names "
                                           class="form-control @error('Other_names') is-invalid @enderror"
                                           value="{{old('Other_names')}}">
                                    @error('Other_names')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mb-2">
                                    <input type="text" name="Email" placeholder=" University Mail"
                                           class="form-control @error('First_name') is-invalid @enderror"
                                           value="{{old('First_name')}}">
                                    @error('Email')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group mt-2">
                                <label for="image">Input Image</label>
                                <input type="file" name="Avatar" placeholder="Input Image"
                                       class="form-control  @error('Avatar') is-invalid @enderror">
                                @error('Avatar')
                                <span class="text-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


