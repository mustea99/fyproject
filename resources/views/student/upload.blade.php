@extends('layouts.master')
@section('title', 'Student|Upload')
@section('content')
    <div class="col-xl-10">
        <div class="card m-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Upload Document </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('student.proposal.upload.save', $proposalId)}}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Project Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <select name="chapter" class="form-control" id="exampleFormControlSelect1">
                                    <option>Chapter One</option>
                                    <option>Chapter Two</option>
                                    <option>Chapter Three</option>
                                    <option>Chapter Four</option>
                                    <option>Chapter Five</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input name="document" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection
