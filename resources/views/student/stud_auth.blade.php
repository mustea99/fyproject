<html>
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link href="img/logo/logo.png" rel="icon">
            <link href={{asset("assets/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
            <link href={{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
            <link href={{asset("assets/css/ruang-admin.min.css")}} rel="stylesheet">   
            <title>Student Authentication Page </title>
    </head>
    
<body >
                    <div style="letter-spacing:2px;padding:2px;text-transform:uppercase;font-weight:bold;"><h4 class="text-center text-info mt-4"style="font-weight:bolder;">Student Authentication</h4></div>
                    <div class="container-login">
                        <div class=" col-lg-12 mt-4">
     
                            @php
                                echo\App\PageMsg::renderAll();
                            @endphp
                            
                                      <form action="" method="POST" class="user" style="border:1px solid white;">
                                        @csrf
                                        <div class="form-group mb-4">
                                          <input type="text" class="form-control mb-2 @error('RegNo') is-invalid @enderror"
                                          placeholder="Registration Number" name="RegNo" value="{{old('RegNo')}}" required style="font-size:16px;">
                                   <div class="d-inline">
                                       @error('RegNo')
                                       <div class="text-danger">{{$message}}</div>
                                       @enderror
                                   </div>
                                        </div>
                                    
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-info btn-block" style="font-weight:bolder;letter-spacing:2px;">Authenticate</button>
                                        </div>
                                        <div class="nav-divider" style="margin-top:-14px;"><hr></div>
                                        <div><h6 class="text-center text-azure" style="letter-spacing:2px;font-size:18px;font-weight:bolder;">Already Authenticated ? <a class="link text-info" href="{{ route('student.auth.login')}}" style=" text-decoration:none;font-weight:bolder;font-size:20px;">Login</a></h6></div>
                                      </form>
                                    </div>
                                  </div>
                                
</body>

</html>