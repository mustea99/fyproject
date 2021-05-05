@extends('layouts.master')
@section('title', 'Student|View Notice Board');
@section ('content')

@foreach($noticeboards as $noticeboard)
{{ $noticeboard->Message }};
    
@endforeach
@endsection