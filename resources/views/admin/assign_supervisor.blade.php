@extends('layouts.admin')

@section('title', 'Admin| Assign Supervisor')

@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row  align-items-center justify-content-between">
                <h6 class=" m-0 font-weight-bold text-primary">Student list </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
                  {{-- <div class="mb-2"><a href="#"><button class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Add Student</button></a></div> --}}
            {{-- @foreach($students as $Student) --}}
                 <table class="table table-boarded table-responsive">
                     <thead>
                         <tr>
                             <td>ID</td>
                             <td>Name</td>
                             <td>Reg Number</td>
                             <td>Action</td>
                         </tr>
                     </thead>
                     <tbody>
                  @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->First_name }} {{ $student->Other_names }}</td>
                        <td>{{ $student->RegNo}}</td>
                        <td>
                            <a href="{{ route('admin.assign_supervisor.list-lecturers', $student->id) }}" class="btn btn-md btn-primary">Assign</a>
                        </td>
                    </tr>
                  @endforeach
                 </div>
                  </tbody>
             </table>
                  </div>
             {{-- @endforeach --}}
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