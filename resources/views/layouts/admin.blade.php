<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>@yield('title', env('APP_NAME'))</title>
    <link href={{asset("assets/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/ruang-admin.min.css")}} rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" >
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon">
                {{-- <img src="{{asset ('assets/img/logo/adminlogo3.jpg')}}" width="100px" height="100px" style="border-radius:200px;">  --}}
            </div>
            <div class="sidebar-brand-text mx-3">@if(auth()->guard('admin')->check())PROJECT COORDINATOR @endif</div>
        </a>

        @if(auth()->guard('admin')->check())
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size:14px;">Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Lecturer
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('admin.manage_lecturer')}}" >
                    <i class="fa fa-plus"></i>
                    <span style="font-size:14px;">Add Lecturer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('admin.view_lecturer')}}" style="font-size:20px;">
                    <i class="fa fa-users-cog"></i>
                    <span style="font-size:14px;">Manage Lecturer</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Student
            </div>
           
            <li class="nav-item">
                <a class="nav-link" href="{{Route('admin.manage_student')}}" >
                    <i class="fa fa-file-import"></i>
                    <span style="font-size:14px;">Import Student</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('admin.view_student')}}" >
                    <i class="fa fa-users-cog"></i>
                    <span style="font-size:14px;">Manage Student</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Information
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.post')}}" >
                    <i class="fa fa-envelope"></i>
                    <span style="font-size:14px;">Notice Board</span>
                </a>
            </li>
            {{-- <hr class="sidebar-divider">
            <div class="sidebar-heading">
               Project
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('admin.manage_project')}}" style="font-size:20px;">
                    <i class="fa fa-wallet"></i>
                    <span style="font-size:14px;"> Manage Project</span>
                </a>
            </li> --}}
        {{-- @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.login')}}">
                    <i class="fa fa-sign-in-alt"></i>
                    <span style="text-transform:uppercase;">Login</span>
                </a>
            </li>  --}}
        @endif
        <hr class="sidebar-divider">
       
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="background-color:dark;">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-2 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                @if(auth()->guard('admin')->check())
                            <form action="{{route('admin.logout')}}" id="formLogout" method="post">@csrf</form>
                            <div style="margin-left:900px;color:white; text-transform:uppercase;" > 
                            <a class="btn btn-link " onclick="document.getElementById('formLogout').submit();">
                                <span class="fas fa-sign-out-alt  text-white-400">Logout</span>
                                </a></div>
                @endif   
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <!--<div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Blank Page</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
                    </ol>
                </div>
                -->

            <div class="d-flex justify-content-center">
                <div class="col-xl-8">
                    @php
                        echo \App\PageMsg::renderAll();
                    @endphp
                </div>
            </div>

            @yield('content')

            {{-- <div class="text-center">
              <img src="img/think.svg" style="max-height: 90px">
              <h4 class="pt-3">save your <b>imagination</b> here!</h4>
            </div> --}}


        </div>
        <!---Container Fluid-->
    </div>
    <!-- Footer -->

    <!-- Footer -->
</div>
</div>

<!-- Scroll to top -->


<script src="{{asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{asset('assets/js/ruang-admin.min.js') }}"></script>
<script src="{{asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{asset('assets/js/demo/chart-area-demo.js') }}"></script>


</body>

</html>

