@extends('layouts.master')
@section('title', 'Student|Profile');
@section ('content')
@include('layouts.studentsidebar')
<div class="col-xl-8 col-lg-7">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profile </h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <div class="card-body">
                    <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
                              
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Other Names</label>
                            <input type="text"class="form-control" placeholder="Other Names">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Email </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="somebody@something.com">
                                    
                                  </div>
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile No</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        
                                      </div>
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Gender</label>
                                           <select class="form-control">
                                                <option> Select gender</option>
                                               <option> Male</option>
                                               <option> Female</option>
                                           </select>
                                            
                                          </div>
                            <div class="form-group">
                                <label for="profilepix">Profle image</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
        </div>
      </div>
@endsection