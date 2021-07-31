@extends('layouts.master')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::guard('student')->user();
    if (null === $user){
        $user = Auth::guard('lecturer')->user();
    }

    $fullName = $user->getFullName();
@endphp

@section('title', 'Student|ChatRoom')

@section ('content')
    <script src="{{asset('js/app.js')}}"></script>
    <div class="row m-4 d-flex justify-content-center col-lg-12">
        <div class="col-xl-8 col-lg-7 col-md-8">
            <div class="card mb-3">
                <div class="card-header text-center d-flex justify-content-between col-lg-12">
                    <div class="text-uppercase font-weight-bold"><i class="fas fa-comments text-warning">&nbsp;</i>Live Chat </div>
                    <div id="connection-state"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-uppercase d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary m-0 text-uppercase"
                            onclick="document.getElementById('messages').innerHTML = ''">
                        <i class="fa fa-brush"></i> Clear Messages
                    </button>
                </div>

                <hr/>

                <div class="card-body">

                    <div id="messages" class="list-group"
                         style="max-height:200px;overflow-x:hidden; overflow-y: auto; border: #0e2135"></div>

                         <form id="formSendMessage" class="mt-3">
                            <div class="row">
                                <div class="col-md">
                            <textarea id="message" class="form-control" rows="1" cols="200" style="width:622px; border-radius:15px;margin-left:5px;"
                                      placeholder="Write your message"></textarea>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary m-0" type="submit" style="margin-left:-300px;"><i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
            <script> initialiseWebsocket('{{$fullName}}'); </script>

        </div>
    </div>

@endsection
