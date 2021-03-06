@extends('layouts.admin')

@section('title', 'Admin|Manage Lecturer')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="card" style="margin-left:-25px;">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Lecturer </h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{route('update.lecturer', $editLecturer->id)}}" enctype="multipart/form-data">
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
                                           value="{{ $editLecturer->First_name }} ">
                                    @error('First_name')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" name="Other_names" placeholder="Other Names "
                                           class="form-control @error('Other_names') is-invalid @enderror"
                                           value="{{$editLecturer->Other_names}}">
                                    @error('Other_names')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mb-2">
                                    <input type="text" name="Email" placeholder=" University Mail"
                                           class="form-control @error('Email') is-invalid @enderror"
                                           value="{{$editLecturer->Email}}">
                                    @error('Email')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col mb-2">
                                        <input type="text" name="Staff_id" placeholder=" Staff ID"
                                               class="form-control @error('Staff_id') is-invalid @enderror"
                                               value="{{$editLecturer->Staff_id}}">
                                        @error('Staff_id')
                                        <span class="text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                            </div>

                            <div class="form-row">
                                    <div class="col mb-2">
                                                <select class="form-control" name="Department">
                                                        <option value="Select Department">Select Department</option>
                                                        <option value="Computer Science" {{ ("$editLecturer->Department == 'Computer Science'")? "selected" : "" }}>Computer Science</option>
                                                        <option value="Software Engineering"{{ ("$editLecturer->Department == 'Software Engineering'")? "selected" : "" }}>Software Engineering</option>
                                                        <option value="Cyber Security" {{ ("$editLecturer->Department == 'Cyber Security'")? "selected" : "" }}>Cyber Security</option>
                                                        <option value="Information Technology" {{ ("$editLecturer->Department == 'Information Technology'")? "selected" : "" }}>Information Technology</option>
                                                      </select>
                                                      @error('Department')
                                                      <span class="text-error">{{ $message }}</span>
                                                    @enderror
                                    </div>
    
                                    <div class="col mb-2">
                                            <input type="text" name="Phone_No" placeholder=" Mobile Number"
                                                   class="form-control @error('Phone_No') is-invalid @enderror"
                                                   value="{{$editLecturer->Phone_No}}">
                                            @error('Phone_No')
                                            <span class="text-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    
                                </div>


                            <div class="form-group mt-2">
                                
                               <textarea name="Office"class="form-control" cols="10" rows="4" value="{{ $editLecturer->Office }}"></textarea>
                                @error('Office')
                                <span class="text-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


