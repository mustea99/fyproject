@extends('layouts.admin')

@section('title', 'Admin|Post Notification')

@section('content')
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-12">
              <div class="card mb-4" style="margin-left:-25px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Notification Panel</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('post.submit')}}">
                    <div class="form-group">
                      @csrf
                      <div class="form-row">
                        <div class="col-lg-1 mb-2">
                        <label for="Recipient">Receiver</label>
                        </div>
                        <div class="col mb-2">
                       <select class="form-control" name="Recipient_type">
                           <option value="student">Student</option>
                           <option value="lecturer">Lecturer</option>
                       </select>
                       @error('Message')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                    </div>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-lg-1 mb-2">
                                <label for="Message">Message</label>
                            </div>
                            <div class="col mb-2">
                            <textarea name="Message"class="form-control" cols="25" rows="4" placeholder="Message body!">{{ old('Message') }}</textarea>
                            @error('Message')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          </div>
                        </div>
                        <div style="margin-left:75px;" ><button type="submit" class="btn btn-primary">Post</button></div>
                      </form>
                         
                </div>
              </div>
            </div>


            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <div class="col">
                    <div class="card" style="margin-left:-60px; width:1080px;">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Notification</h6>
                        <div class="dropdown no-arrow">
                        </div>
                      </div>
                      <div class="card-body">
                              <table class="table table-bordered table-striped" style="width:1000px;">
                                <tr>
                                  <th class="table-header">Sn</th>
                                  <th class="table-header">Category</th>
                                  <th class="table-header">Message</th>
                                  <th class="table-header">Post Date </th>
                                  <th class="table-header">Action </th>
                                </tr>
                                 <tbody>
                                  @foreach($noticeboards as $noticeboard) 
                                   <tr>
                                   <td>{{ $noticeboard->id}}</td>
                                   <td>{{ $noticeboard->Recipient_type }}</td>
                                   <td>{{ $noticeboard->Message }}</td>
                                   <td>{{ $noticeboard->timestamps }}</td>
                                   <td>
                                      <button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                      <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                                   </td>
                                     </tr>
                                  @endforeach
                                 </tbody>
                              </div>
                      </div>
                    </div>
                  </div>
                  
            </div>
   <!-- Topbar -->
        <!-- Container Fluid-->
        <!---Container Fluid-->
      </div>
   
    </div>
  </div>
  
  <script src="{{asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{asset('assets/js/ruang-admin.min.js') }}"></script>
  <script src="{{asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{asset('assets/js/demo/chart-area-demo.js') }}"></script>  
</body>

</html>
@endsection