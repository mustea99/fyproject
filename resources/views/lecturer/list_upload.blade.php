@extends('layouts.lecturersidebar')
@section('title', 'Lecturer|View Uploads List')
@section('content')
    <div class="col-lg-12">
        <div class="card mt-1" style="margin-left:-3px;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">Chapter Uploads List</h6>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Title</th>
                    <th>Chapter  </th>
                    <th>Uploaded At</th>
                    
                    <tbody>

                    @foreach ($project_chapters as $project_chapter)
                    <tr class="table table-hover">
                        <td>{{ $project_chapter->First_name }}{{ $project_chapter->Other_names }}</td>
                        <td>{{ $project_chapter->RegNo }}</td>
                        <td> 
                            <a href="{{ route('lecturer.view_upload', $project_chapter->id) }}">{{ $project_chapter->title}}</a>
                        </td>
                        <td> {{ $project_chapter->chapter}}</td>
                        <td> {{ $project_chapter->created_at}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection