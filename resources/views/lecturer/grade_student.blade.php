@extends('layouts.lecturersidebar')

@section('title','Lecturer|Grade Student')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="card mb-4" style="margin-left:-25px;">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grade Student</h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="">
              <div class="form-group">
                @csrf
                <div class="form-row" style="font-weight:bolder; letter-spacing:2px;">
                  <div class="col-lg-2 mb-2">
                  <label for="Recipient">&nbsp;Chapter One</label>
                  </div>
                  <div class="col-lg-2 mb-2">
                    <label for="Recipient">Chapter Two</label>
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="Recipient">Chapter Three</label>
                        </div>
                        <div class="col-lg-2 mb-2">
                            <label for="Recipient">Chapter Four</label>
                            </div>
                            <div class="col-lg-2 mb-2">
                                <label for="Recipient">Chapter Five</label>
                                </div>
                </div>
           
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-lg-2 mb-2">
                            <select class="form-control" name="Recipient_type">
                                <option value="Execellent">Execellent</option>
                                <option value="Very_good">Very Good</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                                <option value="Poor">Poor</option>
                            </select>
                      </div>
                      <div class="col-lg-2 mb-2">
                        <select class="form-control" name="Recipient_type">
                            <option value="Execellent">Execellent</option>
                            <option value="Very_good">Very Good</option>
                            <option value="Good">Good</option>
                            <option value="Fair">Fair</option>
                            <option value="Poor">Poor</option>
                        </select>
                  </div>
                  <div class="col-lg-2 mb-2">
                    <select class="form-control" name="Recipient_type">
                        <option value="Execellent">Execellent</option>
                        <option value="Very_good">Very Good</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
              </div>
              <div class="col-lg-2 mb-2">
                <select class="form-control" name="Recipient_type">
                    <option value="Execellent">Execellent</option>
                    <option value="Very_good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                </select>
          </div>
          <div class="col-lg-2 mb-2">
                            <select class="form-control" name="Recipient_type">
                                <option value="Execellent">Execellent</option>
                                <option value="Very_good">Very Good</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                                <option value="Poor">Poor</option>
                            </select>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div style="margin-left:3px;" ><button type="submit" class="btn btn-primary">Grade</button></div>
                </form>
                   
          </div>
        </div>
      </div>
@endsection