@extends('layouts.super')

@section('title', 'Admin|View Project Coordinator')

@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row  align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Project Coordinator list </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
          
             <table class="table table-bordered " style="margin-top:-15px; ">
                <th class="table-header">Sn</th>
                <th class="table-header">Email</th>
                <th class="table-header">Password</th>
                <tbody>
                  @foreach($admins as $admin)
                  <tr>
                      <td style="width:10px;">{{ $admin->id }}</td>
                      <td>{{ $admin->email }}</td>
                      <td style="width:15px;">{{ $admin->code }}</td>
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