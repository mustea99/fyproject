@extends('layouts.super')

@section('title', 'Admin|Add Project Coordinator')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="card" style="margin-left:-25px;">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Project Coordinator </h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('super.addProjectCord.submit') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                            @endif --}}
                            <div class="form-row">
                                <div class="col mb-3">
                                    <input type="text" name="email" required placeholder=" University Mail"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                            <div class="col">
                            <button type="submit" class="btn btn-primary">Add</button>
                           
                            </div>
                        </div>
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


