@extends('layouts.lecturersidebar')

@section('title', 'View Upload Info')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Upload Info</div>
                    <div class="card-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <b>Created At: </b> {{ $upload->created_at }}
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <b>Download: </b>
                                <a href="{{ url($upload->document) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-download"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header text-uppercase">Comments</div>
                    <hr/>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($comments as $comment)
                                <div class="list-group-item">
                                    <b> {{$comment->getSender()->First_name}} {{$comment->getSender()->Other_names}}: </b><br/>
                                    <div class="ml-3">{!! nl2br($comment->message) !!}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end">
                            <form action="" method="post" class="mt-2">
                                @csrf
                                <div class="input-group">
                                    <textarea name="message" cols="30" rows="5 " placeholder="Comment..."
                                              class="form-control"></textarea>
                                </div>
                                <div class="text-right mt-2">
                                    <button class="btn btn-sm btn-primary" type="submit">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
