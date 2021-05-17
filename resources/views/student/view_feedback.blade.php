@extends('layouts.master')
@section('title', 'Student|View Feedback')
@section ('content')
<div class="card m-2">
    <div class="card-header text-uppercase font-weight-bold">Chapter upload feedback</div>
    
    <div class="card-body">
        <div class="list-group ">
           
            <table class="table table bordered">
               <tr class="row">
                <th class="col-lg-3">Title</th>
                <th class="col-lg-3">Chapter</th>
                <th class="col">Feedback</th>
               </tr>
                <tbody>
                    @foreach($comments as $comment)
                
                    <tr class="row">
                    <td class="col-lg-3">{{ $comment->title }}</td>
                   <td class="col-lg-3"> {{ $comment->chapter }}</td>
                    <td class="col"> <span><i class="fa fa-comment"></i></span>&nbsp;{{ $comment->comment }}</td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection