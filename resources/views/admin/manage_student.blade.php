@extends('layouts.admin')

@section('title', 'Project Coordinator|Import Student')
@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Student </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
              <form method="POST" action="{{ url('/import') }}" enctype="multipart/form-data">
                @csrf
                    {{-- <div class="form-row">
                        <div class="col mb-2">
                            <input type="text" name="First_name" placeholder="First Name" class="form-control @error('First_name') is-invalid @enderror" value="{{old('First_name')}}" >
                            @error('First_name')
                              <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" name="Other_names" placeholder="Other Names " class="form-control @error('Other_names') is-invalid @enderror" value="{{old('Other_names')}}">
                            @error('Other_names')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="col mb-2">
                            <input type="text" name="RegNo" placeholder="Registration Number" class="form-control  @error('RegNo') is-invalid @enderror" value="{{old('RegNo')}}"> 
                            @error('RegNo')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                        <div class="col">
                            <input type="email" name="Email" placeholder="Email Adress" class="form-control @error('Email') is-invalid @enderror" value="{{old('Email')}}">
                            @error('Email')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col mb-2">
                            <input type="text" name="Phone_No" placeholder="Mobile Number" class="form-control  @error('RegNo') is-invalid @enderror" value="{{old('RegNo')}}"> 
                            @error('Phone_No')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                        <div class="col">
                            <select class="form-control" name="Department">
                              <option value="Select Department" selected>Select Department</option>
                              <option value="Computer Science">Computer Science</option>
                              <option value="Software Engineering">Software Engineering</option>
                              <option value="Cyber Security">Cyber Security</option>
                              <option value="Information Technology">Information Technology</option>
                            </select>
                            @error('Department')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6"> 
                          <select class="form-control" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          </div>
                        <div class="col-md-6"> 
                          <select class="form-control" name="Supervisor_id">
                            <option selected>Select Supervisor</option>
                            @foreach($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}">{{ $lecturer->First_name }} {{ $lecturer->Other_names }}</option>
                            @endforeach
                          </select>
                          </div>
                      
                      </div>
                     --}}
                     <div class="form-row">
                       <div class="col">
                     <input type="file" name="file" class="form-control">
                       </div>
                     </div>
                    <button class="btn btn-md btn-primary mt-4" type="submit">
                      Import
                    </button>
               </form> 
              </div>
            </div>
          </div> 
            </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Topbar -->
        <!-- Container Fluid-->
        <!---Container Fluid-->

 
@endsection