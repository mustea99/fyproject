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
    <title>Supervisor Login Page </title>
</head>

<body style="background-color:white;">


{{-- <div class="d-flex justify-content-center">
    <div class="col-sm-4" style="margin-top:220px;margin-left:870px;">

                <form action="" method="POST" style="border:darkslategrey;">
                    <div class="header text-white mt-3" style="margin-left:100px;"><h2>Student Login </h2></div>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('RegNo') is-invalid @enderror"
                               placeholder="Registration Number" name="RegNo" value="{{old('RegNo')}}" required style="font-size:16px;">
                        <div class="d-inline">
                            @error('RegNo')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control @error('Password') is-invalid @enderror"
                               placeholder="Password" name="Password" required style="font-size:16px;">
                        <div class="d-inline">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button style="font-size:18px;"type="submit" class="btn btn-primary mt-3 form-control">Login</button>
                    </div>
                </form>
            </div>


                --}}
                <div class="text-center "><img src="{{ asset('assets\img\logo\buk.png') }}" width="150px" height="150px"></div>

<div style=" letter-spacing:3px;padding:2px;text-transform:capitalize;font-weight:bold;"><h3
        class="text-center text-info mt-4" style="font-weight:bolder;">Supervisor Login</h3></div>
<div class="container-login">
    <div class=" col-lg-12 mt-4">
        @php
            echo \App\PageMsg::renderAll();
        @endphp
        <form method="POST" action="{{ route('lecturer.auth.login.submit') }}" style="border:3px solid white;">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mb-4" required placeholder="University Mail" name="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control mb-4" required placeholder="Password" name="Password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Login</button>
            </div>
        </form>
    </div>
</div>

</body>

</html>
