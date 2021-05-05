@extends('layouts.admin')

@section('title', 'Admin|View Lecturer')

@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-11">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row  align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lecturer list </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
               
               <div class="table-responsive">
             <table class="table table-bordered table-striped lecturer_table" style="margin-top:-15px;">
                <th class="table-header">Sn</th>
                <th class="table-header">First Name</th>
                <th class="table-header">Other Names</th>
                <th class="table-header">University Mail</th>
                <th class="table-header">Action</th>
                <tbody>
                  @foreach($lecturers as $lecturer)
                  <tr>
                      <td>{{ $lecturer->id }}</td>
                      <td>{{ $lecturer->First_name }}</td>
                      <td>{{ $lecturer->Other_names }}</td>
                      <td>{{ $lecturer->Email }}</td>
                      <td>
                        <button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
             </table>
            </div>
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