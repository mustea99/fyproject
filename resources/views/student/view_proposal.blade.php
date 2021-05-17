@extends('layouts.master')
@section('title','Student|View Proposal')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card ">
            <div class="card-header text-uppercase font-weight-bold">Proposal : {{ $proposal->title }}</div>
            <div class="card-body">
                <div class="list-group">
                    <div class="list-group-item"><b>Title :</b> {{ $proposal->title }}</div>
                    <div class="list-group-item">
                        <b>Lecturer :</b> {{ $proposal->First_name }} {{ $proposal->Other_names }}
                    </div>
                    <div class="list-group-item"><b>Status :</b> {!! $proposal->getTextualStatus() !!}</div>
                    <div class="list-group-item"><b>Time :</b> {{ $proposal->created_at }}</div>
                </div>
                <div class="mt-4 text-right">
                    <a href="{{route('student.proposal.upload', $proposal->id)}}" class="btn btn-md btn-primary">
                        <i class="fa fa-upload"></i> Upload Chapter
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
