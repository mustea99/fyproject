@extends('layouts.admin')

@section('title', 'Project Coordinator|Dashboard')

@section('content')

<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Approved Projects </h6>
    </div>
    <div class="card-body">
      <div class="w3-padding w3-white notranslate">
        <table class="table table-bordered table-striped" style="margin-top:-15px;">
        <thead>
        <tr>
          
          <th>Name</th>
          <th>Registration Number</th>
          <th>Project Title</th>
          <th>Case Study</th>
          
        </tr>
        </thead>
        <tbody>
        @foreach ($approved_projects as $approved_project)
       
          <tr>
            
            <td>{{  $approved_project->Name}}</td>
            <td>{{  $approved_project->RegNo}}</td>
            <td>{{  $approved_project->ProjectTitle}}</td>
            <td>{{  $approved_project->CaseStudy}}</td>
          </tr>
          @endforeach
        </tbody>
        
        </table>
        </div>

  </div>
</div>
@endsection
