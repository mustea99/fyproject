@extends('layouts.lecturersidebar')

@section('title', 'View Proposal')


@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase font-weight-bold d-flex justify-content-between p-3">
                        <span class="mt-1">Proposal Information</span>
                        <a href="{{ url("uploads/".$proposal->document)}}"
                           class="btn btn-sm btn-primary">
                            <span><i class=" fa fa-download"></i>&nbsp; Download</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <div class="list-group-item"><b>Title: </b>{{$proposal->title}}</div>
                            <div class="list-group-item"><b>Date & Time: </b>{{$proposal->created_at}}</div>
                            <div class="list-group-item d-flex justify-content-between">
                                <b>Status</b>
                                {!! $proposal->getTextualStatus('mt-1') !!}
                            </div>
                        </div>
                        <div class="mt-4 text-right">
                            @if(0 == $proposal->status)
                                <a href="{{route('lecturer.proposal.accept', $proposal->id)}}"
                                   class="btn btn-sm btn-success rounded">
                                    <i class="fa fa-check"></i> Accept
                                </a>
                                <a href="{{route('lecturer.proposal.reject', $proposal->id)}}"
                                   class="btn btn-sm btn-danger rounded">
                                    <i class="fa fa-times"></i> Reject
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-uppercase font-weight-bold">Proposal Chapters</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Document</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{$chapter->title}}</td>
                                    <td>
                                        <a href="{{url('uploads/' . $chapter->document)}}"
                                           class="btn btn-sm btn-primary">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
