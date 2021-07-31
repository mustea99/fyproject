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
<div id="wrapper" style="background-color: #a0aec0">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin') }}">
            <div class="sidebar-brand-icon">
                {{-- <img src="{{asset ('assets/img/logo/adminlogo3.jpg')}}" width="100px" height="100px" style="border-radius:200px;">  --}}
            </div>
            <div class="sidebar-brand-text mx-3">STUDENT</div>
        </a>
        @if(auth()->guard('student')->check())
            {{-- <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="{{url('student/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size:15px;letter-spacing:1px;">Dashboard</span></a>
            </li> --}}
            {{-- <hr class="sidebar-divider"> --}}
            <div class="sidebar-heading mt-3">
               Supervisor
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.view_supervisor') }}">
                    <i class="fa fa-eye"></i>
                    <span style="font-size:15px;letter-spacing:1px;">View Supervisor</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
               Project Proposals
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.proposal')}}">
                    <i class="fa fa-list"></i>
                    <span style="font-size:15px;letter-spacing:1px;"> List Proposals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.proposal.add')}}">
                    <i class="fa fa-plus"></i>
                    <span style="font-size:15px;letter-spacing:1px;"> Create Proposal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.uploads.index')}}">
                    <i class="fa fa-list"></i>
                    <span style="font-size:15px;letter-spacing:1px;"> List Uploads</span>
                </a>
            </li>
            <li class="nav-item">
                @php
                    $id=Auth::guard('student')->user()->id;
                @endphp
            </li>
           
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Information
            </div>
            <li class="nav-item">
                <a class="nav-link mb-2" href="{{route ('student.view_notice_board') }}">
                    <i class="fa fa-eye"></i>
                    <span style="font-size:15px;letter-spacing:1px;"> View Notice Board</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                    <a class="nav-link mb-2" href="{{route ('student.view_feedback') }}">
                        <i class="fa fa-eye"></i>
                        <span style="font-size:15px;letter-spacing:1px;"> View Feedback</span>
                    </a>
                </li> --}}
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Project</div>
            <li class="nav-item">
                    <a class="nav-link mb-2" href="{{ route('approved.project') }}">
                        <i class="fa fa-list"></i>
                        <span style="font-size:15px;letter-spacing:1px;">Submit Topic</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <div class="sidebar-heading">Chat Room</div>
                <li class="nav-item">
                        <a class="nav-link mb-2" href="{{ route('student.chat') }}">
                            <i class="fas fa-comments"></i>
                            <span style="font-size:15px;letter-spacing:1px;">Chat</span>
                        </a>
                    </li>
           @else

           <li class="nav-item">
            <a class="nav-link mb-2" href="{{route ('student.auth.login') }}">
                <i class="fa fa-sign-in-alt"></i>
                <span style="font-size:15px;letter-spacing:1px;"> Login</span>
            </a>
        </li>
           @endif
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="background-color:dark;">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-1 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                            <form action="{{route('student.logout') }}" id="formLogout" method="post">@csrf</form>
                            <div style="margin-left:900px;color:white; text-transform:uppercase;" > 
                            <a class="btn btn-link " onclick="document.getElementById('formLogout').submit();">
                                <span class="fas fa-sign-out-alt  text-white-400">Logout</span>
                                </a></div>
                        
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

