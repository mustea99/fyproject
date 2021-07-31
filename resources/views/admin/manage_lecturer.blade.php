@extends('layouts.admin')

@section('title', 'Project Coordinator|Add Lecturer')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="card" style="margin-left:-25px;">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Lecturer </h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            {{-- @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                            @endif --}}
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
                                           class="form-control @error('Email') is-invalid @enderror"
                                           value="{{old('Email')}}">
                                    @error('Email')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col mb-2">
                                        <input type="text" name="Staff_id" placeholder=" Staff ID"
                                               class="form-control @error('Staff_id') is-invalid @enderror"
                                               value="{{old('Staff_id')}}">
                                        @error('Staff_id')
                                        <span class="text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                            </div>

                            <div class="form-row">
                                    <div class="col mb-2">
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
    
                                    <div class="col mb-2">
                                            <input type="text" name="Phone_No" placeholder=" Mobile Number"
                                                   class="form-control @error('Phone_No') is-invalid @enderror"
                                                   value="{{old('Phone_No')}}">
                                            @error('Phone_No')
                                            <span class="text-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    
                                </div>


                            <div class="form-group mt-2">
                                
                               <textarea name="Office"class="form-control" cols="10" rows="4" placeholder="Office Address"></textarea>
                                @error('Office')
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




{{-- import section --}}

{{-- <div class="container-fluid mt-4" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between">
      
    <div class="col-lg-12">
      <div class="card" style="margin-left:-25px;">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Import Lecturer Data</h6>
          <div class="dropdown no-arrow">
          </div>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ url('/importLecturer') }}" enctype="multipart/form-data">
          @csrf
              
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
</div> --}}
@endsection


