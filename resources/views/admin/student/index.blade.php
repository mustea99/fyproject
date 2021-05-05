@extends('layouts.admin')

@section('title', 'Students')

@section('content')
    <div class="col-md-8 mt-4">
            @foreach ($students as $student)
            <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Sn</th>
                      <th>Firstname</th>
                      <th>Othername</th>
                      <th>Registration Number</th>
                      <th>Email</th>
                      <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                   <td>{{ $student->id}}</td>
                   <td>{{ $student->First_name}} </td>
                   <td>{{ $student->Other_names}} </td>
                   <td>{{ $student->RegNo}}</td>
                   <td>{{ $student->Email}}</td>
                   <td>{{ $student->Gender}}</td>
                    </tbody>
                    </table>
            @endforeach

    </div>
@endsection
