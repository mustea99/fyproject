@extends('layouts.admin')

@section('title', 'Admin| Assign Supervisor')

@section('content')

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between">
            
          <div class="col-lg-12">
            <div class="card" style="margin-left:-25px;">
              <div class="card-header py-3 d-flex flex-row  align-items-center justify-content-between">
                <h6 class=" m-0 font-weight-bold text-primary">Supervisor list </h6>
                <div class="dropdown no-arrow">
                </div>
              </div>
              <div class="card-body">
                  <form action="" method="POST">
                  {{-- <div class="mb-2"><a href="#"><button class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Add Student</button></a></div> --}}
            {{-- @foreach($students as $Student) --}}
                 <table class="table table-bordered ">
                     <thead>
                         <tr>
                             <td>Option</td>
                             <td>ID</td>
                             <td>Name</td>
                             <td>Email</td>
        
                         </tr>
                     </thead>
                     <tbody>
                  @foreach ($lecturers as $lecturer)
                    <tr>
                        <td>
                            <input type="radio" value="{{ $lecturer->id }}" name="lecturer" class="form-control">
                        </td>
                        <td>{{ $lecturer->id }}</td>
                        <td>{{ $lecturer->First_name }} {{ $lecturer->Other_names }}</td>
                        <td>{{ $lecturer->Email}}</td>
                       
                    </tr>
                  @endforeach
                 </div>
                  </tbody>
                  
                 </table>
                  <div class="mt-4 text-right">
                        <button type="submit" class="btn btn-md btn-primary">Assign Lecturer</button>
                    </div>
                </form>
                  </div>
             {{-- @endforeach --}}
              </div>
            </div>
          </div> 
            </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Topbar -->
        <!-- Container Fluid-->
        <!---Container Fluid-->
@endsection