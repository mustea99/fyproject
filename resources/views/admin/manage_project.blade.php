@extends('layouts.admin')

@section('title', 'Project Coordinator|View Project')

@section('content')
<div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Approved Projects </h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <div class="card-body">
              <table class="table table-bordered table-striped" style="margin-top:-15px;">
                  <thead>
                  <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Project Title</th>
                    <th>Case Study</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
          
                  </tbody>
                  </table>
                   
          </div>
        </div>
      </div>




@endsection
