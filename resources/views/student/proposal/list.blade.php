@extends('layouts.master')

@section('title', 'List Proposals')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header font-weight-bold">LIST PROJECT PROPOSALS</div>
            <div class="card-body ">
                <div class="list-group">
                    @foreach ($proposals as $proposal)
                        <a href="{{ route('student.proposal.view', $proposal->id) }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span><i class="fa fa-file"></i> {{ $proposal->title }}</span>
                            <span>{!! $proposal->getTextualStatus() !!}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
