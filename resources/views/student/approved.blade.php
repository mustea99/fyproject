@extends('layouts.master')
@section('title','Student|Submit Project Topic')
@section('content')
@section ('content')
@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="text text-warning">
          <h6 class="text text-center" style="font-weight:bolder;">Please Submit Only Approved Project Topic Here !</h6>
        </div>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Submit Project Topic </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
              <form method="POST" action="{{ route('approved.submit') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="col mb-2">
                            <input type="text" name="Name" placeholder=" Student Name" class="form-control @error('Name') is-invalid @enderror" value="{{old('Name')}}" >
                            @error('Name')
                              <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" name="RegNo" placeholder="Registration Number" class="form-control @error('RegNo') is-invalid @enderror" value="{{old('RegNo')}}">
                            @error('RegNo')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="col mb-2">
                            <input type="text" name="ProjectTitle" placeholder="Project Title" class="form-control  @error('ProjectTitle') is-invalid @enderror" value="{{old('ProjectTitle')}}"> 
                            @error('ProjectTitle')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                        <div class="col">
                            <input type="text" name="CaseStudy" placeholder="Case Study" class="form-control @error('CaseStudy') is-invalid @enderror" value="{{old('CaseStudy')}}">
                            @error('CaseStudy')
                            <span class="text-error">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                    
                    <button class="btn btn-md btn-primary mt-4">
                       Submit
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
@endsection
