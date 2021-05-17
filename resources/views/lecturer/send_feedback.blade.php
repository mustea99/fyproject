@extends('layouts.lecturersidebar')

@section('title','Lecturer|Send Feedback')
@section('content')


        <div class="card m-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Upload Document </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('send.feedback.submit',$feedback->id) }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                      <input type="text" name="student_id" style="display: none;" name="" value="{{ $feedback->student }}" id="">
                      <input type="text" name="lecturer_id" style="display: none;" name="" value="{{ $feedback->lecturer }}" id="">
                        <div class="form-row">
                           
                                
                                <div class="col">
                                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Project Title" value="{{ $feedback->title }}">
                                 </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <select name="chapter" class="form-control" id="exampleFormControlSelect1">
                                    <option value="Chapter One"{{ ($feedback->chapter == 'Chapter One')? "selected" : "" }}>Chapter One</option>
                                    <option value="Chapter Two" {{ ($feedback->chapter == 'Chapter Two')? "selected" : "" }}>Chapter Two</option>
                                    <option value="Chapter Three"{{ ($feedback->chapter == 'Chapter Three')? "selected" : "" }}>Chapter Three</option>
                                    <option value="Chapter Four"{{ ($feedback->chapter == 'Chapter Four')? "selected" : "" }}>Chapter Four</option>
                                    <option value="Chapter Five"{{ ($feedback->chapter == 'Chapter Five')? "selected" : "" }}>Chapter Five</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea placeholder="Comments!" name="comment" rows="4"class="form-control mb-4"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Feedback</button>
                </form>
            </div>
        </div>
    </div>
@endsection