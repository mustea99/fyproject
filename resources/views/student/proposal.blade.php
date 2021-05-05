@extends('layouts.master')
@section('title', 'Student|Project Proposal');
@section ('content')
<div class="col-xl-10">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Upload Proposal </h6>
      </div>
      <div class="card-body">
                <form>
                        <div class="form-group">
                          <div class="form-row mb-4">
                            <div class="col">
                          <input type="text" class="form-control"  placeholder="Project Title">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Supervisor">
                            </div>
                        </div>
                      </div>
                      
                        <div class="form-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Upload</button>
                      </form>
      </div>
    </div>
  </div>
@endsection
