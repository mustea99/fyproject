@extends('layouts.admin')

@section('title', 'Project Coordinator|Manage Student')

@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-2 d-flex flex-row  align-items-center justify-content-between">
                <h6 class=" m-0 font-weight-bold text-primary">Student list </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
                  {{-- <div class="mb-2"><a href="#"><button class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Add Student</button></a></div> --}}
            {{-- @foreach($students as $Student) --}}
        
                <table class="table table-bordered  table striped" style="margin-top:-15px;">
                <th class="table-header">Sn</th>
                <th class="table-header">Name</th>
               
                <th class="table-header">Registration Number </th>
                
                <th class="table-header">Lecturer</th>
               
                <th class="table-header">Action</th>
                <tbody>
                  @foreach ($students as $student)
                    <tr>
                      <td>{{ $student->id }}</td>
                    <td>{{ $student->First_name }} {{ $student->Other_names }}</td>
                    
                    <td>{{ $student->RegNo}}</td>
                   
                    <td>{{ $student->lFirst_name }} {{ $student->lOther_names }}</td>
                  
                    <td> 
                      <a onclick="return confirm('Are You sure to delete');" href="{{ route('delete.student', $student->id) }}"class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                      <a href="{{ route('edit.student', $student->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                </tbody>
                @endforeach 
              </table>  
            
             {{-- @endforeach --}}
              </div>
            </div>
          </div> 
            </div>
        </div>
      
   <!-- Topbar -->
        <!-- Container Fluid-->
        <!---Container Fluid-->
@endsection