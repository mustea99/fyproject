@extends('layouts.lecturersidebar')

@section('title','Lecturer|View Student')
@section('content')
@section('content')
<div class="card m-3">
    <div class="card-header text-uppercase font-weight-bold">My Students</div>
    <hr/>
    <div class="card-body p-2">
        <div class="list-group p-2">
               
                <table class="table table-bordered table-striped">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Registration Number</th>
                  <th>Department</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                                @foreach($students as  $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td> {{ $student->First_name }} {{ $student->Other_names }}</td>
                                <td>{{ $student->RegNo }}</td>
                                <td>{{ $student->Department }}</td>
                                <td>{{ $student->Email }}</td>
                                <td>{{ $student->Phone_No }}</td>
                            </tr>
                            @endforeach
                         
                  
                </table>
           
        </div>
    </div>
</div>

   
   
  
    
@endsection