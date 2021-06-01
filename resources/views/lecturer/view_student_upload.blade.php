@extends('layouts.lecturersidebar')

@section('title','Lecturer|View Student Upload')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="card mb-4 mt-2" style="margin-left:-25px;">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-uppercase">Students Project Documents</h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <div class="card-body">
<table class="table table-bordered  ">
    <th>Sn</th>
    <th>Name</th>
    <th>Registration Number</th>
    <th>Project Title</th>
    <th>Chapter</th>
    <th>Document</th>
    <th>Comment</th>
    {{-- <th>Uploaded At</th> --}}
    <tbody>
        @foreach($project_chapters as $project_chapter)
        <tr>
            <td> {{$project_chapter->id }}</td>
            <td> {{ $project_chapter->First_name }}  {{ $project_chapter->Other_names }}</td>
            <td> {{ $project_chapter->RegNo }}</td>
            <td> {{ $project_chapter->title }}</td>
            <td>{{ $project_chapter->chapter }}</td>
            <td> <a href="{{ url("uploads/".$project_chapter->document)}}" class="btn btn-primary"><span><i class=" fa fa-download">&nbsp;Download</i></span></a></td>
             <td><a  href=""class="btn btn-info"><i class="fa fa-edit"></i></a></td>
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
