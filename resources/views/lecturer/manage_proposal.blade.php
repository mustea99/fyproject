@extends('layouts.lecturersidebar')

@section('title','Lecturer|Manage Proposal')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="card mb-4 mt-2" style="margin-left:-25px;">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-uppercase">Students Proposals</h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <div class="card-body">
<table class="table table-bordered  ">
    <th>Sn</th>
    <th>Name</th>
    <th>Proposal</th>
    <th>Document</th>
    <th>Uploaded At</th>
    <tbody>
        @foreach($proposals as $proposal)
        <tr>
            <td> {{ $proposal->id }}</td>
            <td> {{ $proposal->First_name }}  {{ $proposal->Other_names }}</td>
            <td> {{ $proposal->title }}</td>
            <td> <a href="{{ url("uploads/".$proposal->document)}}" class="btn btn-primary"><span><i class=" fa fa-download">&nbsp;Download</i></span></a></td>
            <td>{{ $proposal->created_at}}</td>
        </tr> 
        @endforeach  
    </tbody>    
</table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection