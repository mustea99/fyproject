@extends('layouts.admin')

@section('title', 'Admin|Dashboard')

@section('content')

<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Recently Added Projects </h6>
    </div>
    <div class="card-body">
      <div class="w3-padding w3-white notranslate">
        <table class="table table-bordered table-striped" style="margin-top:-15px;">
        <thead>
        <tr>
          <th>Sn</th>
          <th>Name</th>
          <th>Registration Number</th>
          <th>Project Title</th>
          <th>Case Study</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>
        </div>

  </div>
</div>
@endsection
