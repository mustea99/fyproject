@extends('layouts.master')
@section('title','Student|View Supervisor');
@section('content')
<div class="card m-4">
        <div class="card-header text-uppercase font-weight-bold">Student Supervisor</div>
        <hr/>
        <div class="card-body">
            <table class="table table-bordered p-2 shadow mb-2" style="margin-top:-5px;">
                <tr>
                    <td style="font-weight:bolder;">Name</td>
                    <td>{{ $supervisor->First_name  }} {{ $supervisor->Other_names }}</td>
                </tr> 
                 <tr>
                    <td style="font-weight:bolder;">Email</td>
                    <td>{{ $supervisor->Email  }}</td>
                </tr>
                <tr>
                     <td style="font-weight:bolder;">Mobile No</td>
                     <td>{{ $supervisor->Phone_No }}</td>
                </tr>  
                <tr>
                      <td style="font-weight:bolder;">Department</td>
                      <td>{{ $supervisor->Department }}</td>
                </tr> 
                <tr>
                      <td style="font-weight:bolder;">Office</td>
                      <td>{{ $supervisor->Office }}</td>
                </tr>   
            </table>
            
@endsection
