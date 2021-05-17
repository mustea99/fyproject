@extends('layouts.master')
@section('title', 'Student|View Notice Board')
@section ('content')

<div class="card m-4">
    <div class="card-header text-uppercase font-weight-bold">Notice Board</div>
    <hr/>
    <div class="card-body p-2">
        <div class="list-group p-2">
            @foreach($noticeboards as $noticeboard)
                <div class="list-group-item shadow">
                    <i class="fa fa-bell"></i>
                    {{ $noticeboard->Message }}  <div><small style="float:right;"><i>{{  $noticeboard->created_at}}</i></small></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection